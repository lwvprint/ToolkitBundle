/* Update datepicker plugin so that DD/MM/YYYY format is used. */
$.extend($.fn.datepicker.defaults, {
parse: function (string) {
  var matches;
  if ((matches = string.match(/^(\d{2,2})\/(\d{2,2})\/(\d{4,4})$/))) {
    return new Date(matches[3], matches[2] -1, matches[1]);
  } else {
    return null;
  }
},
format: function (date) {
  var
    month = (date.getMonth() + 1).toString(),
    dom = date.getDate().toString();
  if (month.length === 1) {
    month = "0" + month;
  }
  if (dom.length === 1) {
    dom = "0" + dom;
  }
  return dom + "/" + month + "/" + date.getFullYear();
}
});

/* Bootstrap Tooltips */
$('.tool-tip').tooltip();

/* DataTables */
$(document).ready(function() {
    $('#toolkit_datatable').dataTable({
        "bProcessing": true,
        "sAjaxSource": '../toolkit/toolkit.json',
        "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
        "sPaginationType": "bootstrap",
        "aoColumns": [
            { "asSorting": [ "asc", "desc" ], "mDataProp": "name" },
            { "mDataProp": "url" },
            { "bSortable": false, "mDataProp": "is_active" },
            { "bSortable": false, "mDataProp": null }
        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            if ( aData['is_active'] == true )
            {
                $('td:eq(2)', nRow).html( '<i class="icon-ok"></i>' );
            }
            $('td:eq(3)', nRow).html(
                '<div class="btn-group"><a class="btn btn-small" href="../'+ aData['slug'] +'/company">Companies</a>'+
                '<a class="btn btn-small" href="../toolkit/'+ aData['id'] +'/show">View</a>'+
                '<a class="btn btn-small" href="../toolkit/'+ aData['id'] +'/edit">Edit</a></div>'
            );
            return nRow;
        }
    });
});