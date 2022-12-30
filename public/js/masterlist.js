$("document").ready(function () {
    $("#filterTable").dataTable({
      // dom:'Bfrtip',
      searching: true,
      dom: 'lBfrtip<"actions">',
        buttons: [
                    // {
                    //   extend:'copy',
                    //   className: 'btn ',
                    //   text: window.copyButtonTrans,
                    //     exportOptions: {
                    //         columns: ['0','1','2','3','4','5','6'],
                    //     }
                    // },
                    {
                      extend:'excel',
                      className: 'btn ',
                      text: window.excelButtonTrans,
                        exportOptions: {
                            columns: ['0','1','2','3','4','5','6'],
                        }
                    },
                    // {
                    //   extend:'csv',
                    //   className: 'btn ',
                    //   text: window.csvButtonTrans,
                    //     exportOptions: {
                    //         columns: ['0','1','2','3','4','5','6'],
                    //     }
                    // },
                    // {
                    //   extend:'pdf',
                    //   className: 'btn ',
                    //   text: window.pdfButtonTrans,
                    //     exportOptions: {
                    //         columns: ['0','1','2','3','4','5','6'],
                    //     }
                    // },
                    // {
                    //   extend:'print',
                    //   className: 'btn ',
                    //   text: window.printButtonTrans,
                    //     exportOptions: {
                    //         columns: ['0','1','2','3','4','5','6'],
                    //     }
                    // },
                    
                ],

    });
    var table = $('#filterTable').DataTable();

    $("#filterTable_filter.dataTables_filter").append($("#categoryFilter"));
    $("#filterTable_filter.dataTables_filter").append($("#yearFilter"));
    

    var categoryIndex = 0;
    $("#filterTable th").each(function (i) {
      if ($($(this)).html() == "Applying for") {
        categoryIndex = i; return false;
      }
      if ($($(this)).html() == "Date Applied") {
        categoryIndex = i; return false;
      }
    });

    $.fn.dataTable.ext.search.push(
      function (settings, data, dataIndex) {
        var selectedItem = $('#categoryFilter').val()
        var category = data[categoryIndex];
        if (selectedItem === "" || category.includes(selectedItem)) {
          return true;
        }
        return false;
      }
    );

    $("#categoryFilter").change(function (e) {
      table.draw();
    });
    table.draw();
    

    $("#masterlistSearch").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#masterlistSearchTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
    
  });