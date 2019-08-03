var DatatablesSearchOptionsColumnSearch = function() {
    $.fn.dataTable.Api.register("column().title()", function() {
        return $(this.header()).text().trim()
    });
    return {
        init: function() {
            var t;
            t = $("#m_table_1").DataTable({
                responsive: !0,
                ordering: false,
                 select:{
                    style: 'multi'
                },
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
                searchDelay: 500,
                processing: !0,
                serverSide: !0,
                ajax: {
                    url: "https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/datatables/demos/server.php",
                    type: "POST",
                    data: {
                        columnsDef: ["CBox", "RecordID", "OrderID", "Country", "ShipCity", "CompanyAgent", "ShipDate", "Status", "Type", "Actions"]
                    }
                },
                columns: [
                {
                    data: "CBox"
                },
                {
                    data: "RecordID"
                }, {
                    data: "OrderID"
                }, {
                    data: "Country"
                }, {
                    data: "ShipCity"
                }, {
                    data: "CompanyAgent"
                }, {
                    data: "ShipDate"
                }, {
                    data: "Status"
                }, {
                    data: "Type"
                }, {
                    data: "Actions"
                }],
                initComplete: function() {
                    var a = $('<tr class="filter"></tr>').appendTo($(t.table().header()));
                    this.api().columns().every(function() {
                        var e;
                        switch (this.title()) {
                            case "Profile Pic.":
                            e = $('<input type="text" class="form-control form-control-sm form-filter m-input" data-col-index="' + this.index() + '"/>');
                            break;
                            case "Username":
                            e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                                break;
                            case "Contact":
                            e = $('<input type="text" class="form-control form-control-sm form-filter m-input" data-col-index="' + this.index() + '"/>');
                            break;
                            case "State":
                                e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                                break;
                            case "City":
                                e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                                break;
                            case "Status":
                                var n = {
                                    1: {
                                        title: "Pending",
                                        class: "m-badge--info"
                                    },
                                    2: {
                                        title: "Approved",
                                        class: " m-badge--success"
                                    },
                                    3: {
                                        title: "Inactive",
                                        class: " m-badge--primary"
                                    },
                                    4: {
                                        title: "Blocked",
                                        class: " m-badge--warning"
                                    },
                                };
                                e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + n[t].title + "</option>")
                                });
                                break;
                            case "Type":
                                n = {
                                    
                                }, e = $('<select class="form-control form-control-sm form-filter m-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + n[t].title + "</option>")
                                });
                                break;
                            case "Date":
                                e = $('\n\t\t\t\t\t\t\t<div class="input-group date">\n\t\t\t\t\t\t\t\t<input type="text" class="form-control form-control-sm m-input" readonly placeholder="From" data-date-format="yyyy-mm-dd" id="m_datepicker_table1"\n\t\t\t\t\t\t\t\t data-col-index="' + this.index() + '"/>\n\t\t\t\t\t\t\t\t<div class="input-group-append">\n\t\t\t\t\t\t\t\t\t<span class="input-group-text"><i class="la la-calendar-o glyphicon-th"></i></span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class="input-group date">\n\t\t\t\t\t\t\t\t<input type="text" class="form-control form-control-sm m-input" readonly placeholder="To" data-date-format="yyyy-mm-dd" id="m_datepicker_table2"\n\t\t\t\t\t\t\t\t data-col-index="' + this.index() + '"/>\n\t\t\t\t\t\t\t\t<div class="input-group-append">\n\t\t\t\t\t\t\t\t\t<span class="input-group-text"><i class="la la-calendar-o glyphicon-th"></i></span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>');
                                break;
                                case "Membership Type":
                            e = $('<input type="text" class="form-control form-control-sm form-filter m-input" data-col-index="' + this.index() + '"/>');
                            break;
                            case "Actions":
                                var i = $('<button class="btn btn-brand m-btn btn-sm m-btn--icon">\n\t\t\t\t\t\t\t  <span>\n\t\t\t\t\t\t\t    <i class="la la-search"></i>\n\t\t\t\t\t\t\t    <span>Search</span>\n\t\t\t\t\t\t\t  </span>\n\t\t\t\t\t\t\t</button>'),
                                    s = $('<button class="btn btn-secondary m-btn btn-sm m-btn--icon">\n\t\t\t\t\t\t\t  <span>\n\t\t\t\t\t\t\t    <i class="la la-close"></i>\n\t\t\t\t\t\t\t    <span>Reset</span>\n\t\t\t\t\t\t\t  </span>\n\t\t\t\t\t\t\t</button>');
                                $("<th>").append(i).append(s).appendTo(a), $(i).on("click", function(e) {
                                    e.preventDefault();
                                    var n = {};
                                    $(a).find(".m-input").each(function() {
                                        var t = $(this).data("col-index");
                                        n[t] ? n[t] += "|" + $(this).val() : n[t] = $(this).val()
                                    }), $.each(n, function(a, e) {
                                        t.column(a).search(e || "", !1, !1)
                                    }), t.table().draw()
                                }), $(s).on("click", function(e) {
                                    e.preventDefault(), $(a).find(".m-input").each(function(a) {
                                        $(this).val(""), t.column($(this).data("col-index")).search("", !1, !1)
                                    }), t.table().draw()
                                })
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
                    render: function() {
                        return '\n<a href="interior-profile.html">\n<img src="images/dummy-link" class="img-responsive img-label" title="Profile Image" alt="Profile Image">\n</a>'
                    }
                },{
                    targets: -1,
                    title: "Actions",
                    orderable: !1,
                    render: function(t, a, e, n) {
                        return '\n<a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Active">\n<i class="la la-check"></i>\n</a><a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Inactive">\n<i class="la la-ban"></i>\n</a><a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Block">\n<i class="la la-lock"></i>\n</a><a href="edit-product.html" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">\n<i class="la la-edit"></i>\n</a><a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">\n<i class="la la-eye"></i>\n</a><a href="" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\n<i class="la la-trash"></i>\n</a>'
                    }
                }, {
                    targets: 5,
                    width: "150px",
                },{
                    targets: 6,
                    class: "text-center",
                }, {
                    targets: 8,
                    render: function(t, a, e, n) {
                        var i = {
                            1: {
                                title: "Pending",
                                class: "m-badge--info"
                            },
                            2: {
                                title: "Approved",
                                class: " m-badge--success"
                            },
                            3: {
                                title: "Inactive",
                                class: " m-badge--primary"
                            },
                            4: {
                                title: "Blocked",
                                class: " m-badge--warning"
                            },
                        };
                        return void 0 === i[t] ? t : '<span class="m-badge ' + i[t].class + ' m-badge--wide">' + i[t].title + "</span>"
                    }
                }, {
                    targets: 6,
                    render: function(t, a, e, n) {
                        var i = {
                            
                        };
                        return void 0 === i[t] ? t : '<span class="m-badge m-badge--' + i[t].state + ' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-' + i[t].state + '">' + i[t].title + "</span>"
                    }
                }]
            })
        }
    }
}();
jQuery(document).ready(function() {
    DatatablesSearchOptionsColumnSearch.init()
});