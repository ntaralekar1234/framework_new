var DatatablesSearchOptionsColumnSearch = function() {
    $.fn.dataTable.Api.register("column().title()", function() {
        return $(this.header()).text().trim()
    });
    return {
        init: function() {
            var t;
            var base_url = $("#base_url").val();
            t = $("#m_table_1").DataTable({
                ordering: false,
                select:{
                    style: 'multi',
                    selector: 'td:first-child'
                },
                responsive: !0,
                dom: "Bfrltip",
                "lengthMenu": [ [5, 10, 50, -1], [5, 10, 50, "All"] ],
                pageLength: 10,
                language: {
                    lengthMenu: "Display _MENU_"
                },
                buttons: [
                    'selectAll',
                    'selectNone',
                    {
                extend: 'excel',
                messageTop: null
                    },{
                extend: 'pdf',
                messageBottom: null
                    },{
                extend: 'csv',
                messageBottom: null
                },
                ],
                language: {
                    buttons: {
                        selectAll: "Select all items",
                        selectNone: "Select none"
                    }
                },
                searchDelay: 500,
                processing: !0,
                serverSide: !0,
                ajax: {
                    url: base_url+"get_all_admin_users",
                    type: "POST",
                },
                columns: [{
                    data: "CBox"
                }, {
                    data: "Profile"
                }, {
                    data: "Employee ID"
                }, {
                    data: "Name"
                }, {
                    data: "Contact"
                }, {
                    data: "Email"
                }, {
                    data: "Department"
                },{
                    data: "City"
                }, {
                    data: "Role"
                }, {
                    data: "Status"
                }, {
                    data: "Actions"
                }],
                initComplete: function() {
                    var a = $('<tr class="filter"></tr>').appendTo($(t.table().header()));
                    this.api().columns().every(function() {
                        var e;
                        switch (this.title()) {
                            case "Employee ID":
                            e = $('<input type="text" class="form-control form-control-sm form-filter m-input" data-col-index="' + this.index() + '"/>');
                            break;
                            case "Name":
                            e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                            break;
                            case "Contact":
                            e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                            break;
                            case "Email":
                            e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                            break;
                            case "Department":
                            e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                            break;
                            case "City":
                            e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                            break;
                            case "Role":
                            e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                            break;
                            case "Status":
                            var n = {
                                active: {
                                    title: "active",
                                    class: " m-badge--success"
                                },
                                inactive: {
                                    title: "inactive",
                                    class: " m-badge--info"
                                },
                            };
                            e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                $(e).append('<option value="' + t + '">' +  n[t].title + "</option>")
                            });
                            break;
                            case "Actions":
                            var i = $('<button class="btn btn-brand m-btn btn-sm m-btn--icon">\n\t\t\t\t\t\t\t  <span>\n\t\t\t\t\t\t\t    <i class="la la-search"></i>\n\t\t\t\t\t\t\t    <span>Search</span>\n\t\t\t\t\t\t\t  </span>\n\t\t\t\t\t\t\t</button>'),
                            s = $('<button class="btn btn-secondary m-btn btn-sm m-btn--icon">\n\t\t\t\t\t\t\t  <span>\n\t\t\t\t\t\t\t    <i class="la la-close"></i>\n\t\t\t\t\t\t\t    <span>Reset</span>\n\t\t\t\t\t\t\t  </span>\n\t\t\t\t\t\t\t</button>');
                            $("<th class='text-center'>").append(i).append(s).appendTo(a), $(i).on("click", function(e) {
                                e.preventDefault();
                                var n = {};
                                $(a).find(".m-input").each(function() {
                                    var t = $(this).data("col-index");
                                    n[t] ? n[t] += "|" + $(this).val() : n[t] = $(this).val()
                                }), $.each(n, function(a, e) {
                                    t.column(a).search(e || "", !1, !1)
                                }), t.table().draw()
                            });
                            $(s).on("click", function(e) {
                             location.reload();
                           });
                        }
                        $(e).appendTo($("<th>").appendTo(a))
                    }), $("#m_datepicker_table1,#m_datepicker_table2").datepicker({
                        autoclose: true
                    })
},
columnDefs: [{
                'targets': 0,
                'checkboxes': {
                'selectRow': true,
                'selectCallback': function(){
                    printSelectedRows();
                    }
                }
            },{
    targets: 1,
    class:"text-center",
},{
    targets: 2,
    class:"text-center",
},{
    targets: 3,
    class:"text-center",
},{
    targets: 4,
    class:"text-center",
},{
    targets: 5,
    class:"text-center",
},{
    targets: 6,
    class:"text-center",
},{
    targets: 7,
    class:"text-center",
},{
    targets: 8,
    class:"text-center",
},
{
    targets:9,
    class: "text-center",
    render: function(t, a, e, n) {
        var i = {
            active: {
              title: "active",
              class: " m-badge--success"
            },
            inactive: {
              title: "inactive",
              class: " m-badge--info"
            },
        };
        return void 0 === i[t] ? t : '<span class="m-badge ' + i[t].class + ' m-badge--wide">' + i[t].title + "</span>"
    }
},{
    targets: 10,
    class: "text-center"
}]
})
}
}
}();
jQuery(document).ready(function() {
    DatatablesSearchOptionsColumnSearch.init()

    /*var base_url = $("#base_url").val();
    $('#m_table_1').DataTable({
                select:{
                    style: 'multi',
                    selector: 'td:first-child'
                },
                responsive: !0,
                dom: "Bfrltip",
                "lengthMenu": [ [5, 10, 50, -1], [5, 10, 50, "All"] ],
                pageLength: 10,
                language: {
                    lengthMenu: "Display _MENU_"
                },
                buttons: [
                    'selectAll',
                    'selectNone',
                    {
                extend: 'excel',
                messageTop: null
                    },{
                extend: 'pdf',
                messageBottom: null
                    },{
                extend: 'csv',
                messageBottom: null
                },
                ],
                language: {
                    buttons: {
                        selectAll: "Select all items",
                        selectNone: "Select none"
                    }
                },
                searchDelay: 500,
                
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: base_url+"get_all_admin_users",
                    type:"POST",
                    
                },
                
                "columnDefs":[{
                       "defaultContent": "-",
                        "targets": "_all",
                        "orderable" : false,

                }],
                columnDefs: [{
            'targets': 0,
            'checkboxes': {
               'selectRow': true,
               'selectCallback': function(){
                  printSelectedRows();
               }
            }
         }]
               
            });*/
});