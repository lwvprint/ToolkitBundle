<?php

namespace LWV\ToolkitBundle\Controller\Staff;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use LWV\ToolkitBundle\Entity\Product\ProductImage;

class ProductImageController extends Controller
{
    public function indexAction()
    {
        
    }
    
    public function newAction($slug, $category, $product)
    {
        $product = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->findOneBy(array('slug' => $product));
        
        return $this->render('LWVToolkitBundle:Staff/ProductImage:new.html.twig', array(
            'slug' => $slug,
            'category' => $category,
            'product' => $product
        ));
    }
    
    public function uploadAction(Request $request, $slug, $category, $product)
    {
        $response = new Response();
        
        $response->headers->set('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');
        $response->headers->set('Last-Modified', gmdate("D, d M Y H:i:s").' GMT');
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate');
        $response->headers->set('Cache-Control', 'post-check=0, pre-check=0');
        $response->headers->set('Pragma', 'no-cache');
        
        $targetDir = "../web/uploads/images/".$slug."-".$category;
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
        // 5 minutes execution time
        @set_time_limit(5 * 60);
        // Get parameters
        //$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        //$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        //$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';
        
        $chunk = $request->request->get('chunk');
        $chunks = $request->request->get('chunks');
        $fileName = $request->request->get('name');
        
        // Clean the fileName for security reasons
        $fileName = preg_replace('/[^\w\._]+/', '_', $fileName);

        // Make sure the fileName is unique but only if chunking is disabled
        if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
            $ext = strrpos($fileName, '.');
            $fileName_a = substr($fileName, 0, $ext);
            $fileName_b = substr($fileName, $ext);

            $count = 1;
            while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
                $count++;

            $fileName = $fileName_a . '_' . $count . $fileName_b;
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        
        // Create target dir
        if(!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

        // Remove old temp files	
        if($cleanupTargetDir && is_dir($targetDir) && ($dir = opendir($targetDir))) {
            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
                    @unlink($tmpfilePath);
                }
            }

            closedir($dir);
        } else {
            die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
        }

        // Look for the content type header
        if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
            $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

        if (isset($_SERVER["CONTENT_TYPE"]))
            $contentType = $_SERVER["CONTENT_TYPE"];

        // Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
        if (strpos($contentType, "multipart") !== false) {
            if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                // Open temp file
                $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {
                    // Read binary input stream and append it to temp file
                    $in = fopen($_FILES['file']['tmp_name'], "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                    fclose($in);
                    fclose($out);
                    @unlink($_FILES['file']['tmp_name']);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
        } else {
            // Open temp file
            $out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
            if ($out) {
                // Read binary input stream and append it to temp file
                $in = fopen("php://input", "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                fclose($in);
                fclose($out);
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        // Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off 
            rename("{$filePath}.part", $filePath);
            
            // Remove "../web/" from path
            $path = str_replace('../web/', '', $filePath);
        }
        
        // Attach image to product
        $prod = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('LWVToolkitBundle:Product\Product')
                ->findOneBy(array('slug' => $product));
        
        $image = new ProductImage();

        $image->setImage($path);
        $image->setProduct($prod);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($image);
        $em->flush();
        
        // Return JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }
    
    public function deleteAction($slug, $category, $product, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $productImage = $em->getRepository('LWVToolkitBundle:Product\ProductImage')->find($id);

        if(unlink('../web/'.$productImage->getImage())) {
            $em->remove($productImage);
            $em->flush();
        }
        
        return $this->redirect($this->generateUrl('staff_product_image_new', array('slug' => $slug, 'category' => $category, 'product' => $product))); 
    }
}