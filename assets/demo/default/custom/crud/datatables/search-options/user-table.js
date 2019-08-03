"use strict";
var KTDatatablesSearchOptionsColumnSearch = function() {
    $.fn.dataTable.Api.register("column().title()", function() {
        return $(this.header()).text().trim()
    });
    return {
        init: function() {
            var t;
            t = $("#kt_table_1").DataTable({
                responsive: !0,
                dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
                language: {
                    lengthMenu: "Display _MENU_"
                },
                searchDelay: 500,
                processing: !0,
                serverSide: !0,
                ajax: {
                    url: "https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/datatables/demos/server.php",
                    type: "POST",
                    data: {
                        columnsDef: ["RecordID", "OrderID", "ShipCity", "CompanyAgent", "ShipDate", "Country", "Status", "Type", "Actions"]
                    }
                },
                columns: [{
                    data: "RecordID"
                }, {
                    data: "OrderID"
                }, {
                    data: "ShipCity"
                }, {
                    data: "CompanyAgent"
                }, {
                    data: "ShipDate"
                }, {
                    data: "Country"
                }, {
                    data: "Status"
                }, {
                    data: "Type"
                }, {
                    data: "Actions",
                    responsivePriority: -1
                }],
                initComplete: function() {
                    var e = this,
                        a = $('<tr class="filter"></tr>').appendTo($(t.table().header()));
                    this.api().columns().every(function() {
                        var e;
                        switch (this.title()) {
                            case "Profile Pic.":
                            case "Name":
                            case "Contact":
                            case "Email":
                            case "Role" :
                            case "State" :
                            case "City" :
                                e = $('<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="' + this.index() + '"/>');
                                break;
                            case "Country":
                                e = $('<select class="form-control form-control-sm form-filter kt-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                                break;
                            case "Actions":
                                var i = $('<button class="btn btn-brand kt-btn btn-sm kt-btn--icon">\n\t\t\t\t\t\t\t  <span>\n\t\t\t\t\t\t\t    <i class="la la-search"></i>\n\t\t\t\t\t\t\t    <span>Search</span>\n\t\t\t\t\t\t\t  </span>\n\t\t\t\t\t\t\t</button>'),
                                    s = $('<button class="btn btn-secondary kt-btn btn-sm kt-btn--icon">\n\t\t\t\t\t\t\t  <span>\n\t\t\t\t\t\t\t    <i class="la la-close"></i>\n\t\t\t\t\t\t\t    <span>Reset</span>\n\t\t\t\t\t\t\t  </span>\n\t\t\t\t\t\t\t</button>');
                                $("<th>").append(i).append(s).appendTo(a), $(i).on("click", function(e) {
                                    e.preventDefault();
                                    var n = {};
                                    $(a).find(".kt-input").each(function() {
                                        var t = $(this).data("col-index");
                                        n[t] ? n[t] += "|" + $(this).val() : n[t] = $(this).val()
                                    }), $.each(n, function(e, a) {
                                        t.column(e).search(a || "", !1, !1)
                                    }), t.table().draw()
                                }), $(s).on("click", function(e) {
                                    e.preventDefault(), $(a).find(".kt-input").each(function(e) {
                                        $(this).val(""), t.column($(this).data("col-index")).search("", !1, !1)
                                    }), t.table().draw()
                                })
                        }
                        "Actions" !== this.title() && $(e).appendTo($("<th>").appendTo(a))
                    });
                    var n = function() {
                        e.api().columns().every(function() {
                            this.responsiveHidden() ? $(a).find("th").eq(this.index()).show() : $(a).find("th").eq(this.index()).hide()
                        })
                    };
                    n(), window.onresize = n, $("#kt_datepicker_1,#kt_datepicker_2").datepicker()
                },
                columnDefs: [{
                    targets: -1,
                    title: "Actions",
                    orderable: !1,
                    render: function(t, e, a, n) {
                        return '\n<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">\n<i class="la la-edit"></i>\n</a>'
                    }
                }, {
                    targets: 5,
                    width: "150px"
                },
                {
                    targets: 8,
                    class: "text-center"
                }]
            })
        }
    }
}();
jQuery(document).ready(function() {
    KTDatatablesSearchOptionsColumnSearch.init()
});