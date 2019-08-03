var KTDatatablesSearchOptionsColumnSearch = function() {
    $.fn.dataTable.Api.register("column().title()", function() {
        return $(this.header()).text().trim()
    });
    var get_base_url = $("#base_url").val();

    return {
        init: function() {
            var t;
            t = $("#kt_table_1").DataTable({
                //ordering: false,
                "order": [],
                select:{style: 'multi',
                    selector: 'td:first-child'
                },
                responsive: !0,
                dom: "Bfrltip",
                "lengthMenu": [ [5, 10, 50, -1], [5, 10, 50, "All"] ],
                pageLength: 10,
                language: {

                     "emptyTable": "No data available in table"
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
                    url: get_base_url+"fetch_all_users",
                    type: "POST",

                },
                columns: [{
                    data: "CBox"
                }, {
                    data: "Country"
                }, {
                    data: "Name"
                }, {
                    data: "Profile"
                }, {
                    data: "Contact"
                }, {
                    data: "Email"
                }, {
                    data: "Role"
                }, {
                    data: "Last Login"
                }, {
                    data: "Status"
                }, {
                    data: "Added By"
                }, {
                    data: "Actions"
                }],
                initComplete: function() {
                    var a = $('<tr class="filter"></tr>').appendTo($(t.table().header()));
                    this.api().columns().every(function() {
                        var e;
                        switch (this.title()) {
                            case "Country":
                                e = $('<select class="form-control form-control-sm form-filter kt-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                $(e).append('<option value="' + t + '">' +  t + "</option>")
                            });
                            break;

                            case "Name":
                            e = $('<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="' + this.index() + '"/>');
                                break;

                            case "Contact":
                                e = $('<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="' + this.index() + '"/>');
                                 break;

                            case "Email":
                                e = $('<input type="text" class="form-control form-control-sm form-filter kt-input" data-col-index="' + this.index() + '"/>');
                                 break;

                            case "Role":
                                e = $('<select class="form-control form-control-sm form-filter kt-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                $(e).append('<option value="' + t + '">' +  t + "</option>")
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
                            e = $('<select class="form-control form-control-sm form-filter kt-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                $(e).append('<option value="' + t + '">' +  n[t].title + "</option>")
                            });
                            break;

                            case "Added By":
                                e = $('<select class="form-control form-control-sm form-filter kt-input" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function(t, a) {
                                $(e).append('<option value="' + t + '">' +  t + "</option>")
                            });
                            break;

                            case "Last Login":
                                e = $('\n\t\t\t\t\t\t\t<div class="input-group date">\n\t\t\t\t\t\t\t\t<input type="text" class="form-control form-control-sm kt-input" readonly placeholder="From" data-date-format="yyyy-mm-dd" id="kt_datepicker_1"\n\t\t\t\t\t\t\t\t data-col-index="' + this.index() + '"/>\n\t\t\t\t\t\t\t\t<div class="input-group-append">\n\t\t\t\t\t\t\t\t\t<span class="input-group-text"><i class="fa fa-calendar-o glyphicon-th"></i></span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class="input-group date">\n\t\t\t\t\t\t\t\t<input type="text" class="form-control form-control-sm kt-input" readonly placeholder="To" data-date-format="yyyy-mm-dd" id="kt_datepicker_2"\n\t\t\t\t\t\t\t\t data-col-index="' + this.index() + '"/>\n\t\t\t\t\t\t\t\t<div class="input-group-append">\n\t\t\t\t\t\t\t\t\t<span class="input-group-text"><i class="fa fa-calendar-o glyphicon-th"></i></span>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>');
                            break;

                            case "Actions":
                                var i = $('<button class="btn btn-brand kt-btn btn-sm kt-btn--icon">\n\t\t\t\t\t\t\t  <span>\n\t\t\t\t\t\t\t    <i class="fa fa-search"></i>\n\t\t\t\t\t\t\t    <span>Search</span>\n\t\t\t\t\t\t\t  </span>\n\t\t\t\t\t\t\t</button>'),
                                    s = $('<button class="btn btn-secondary kt-btn btn-sm kt-btn--icon">\n\t\t\t\t\t\t\t  <span>\n\t\t\t\t\t\t\t    <i class="fa fa-close"></i>\n\t\t\t\t\t\t\t    <span>Reset</span>\n\t\t\t\t\t\t\t  </span>\n\t\t\t\t\t\t\t</button>');
                                $("<th>").append(i).append(s).appendTo(a), $(i).on("click", function(e) {
                                    e.preventDefault();
                                    var n = {};
                                    $(a).find(".kt-input").each(function() {
                                        var t = $(this).data("col-index");
                                        n[t] ? n[t] += "|" + $(this).val() : n[t] = $(this).val()
                                    }), $.each(n, function(a, e) {
                                        t.column(a).search(e || "", !1, !1)
                                    }), t.table().draw()
                                }), $(s).on("click", function(e) {
                                    e.preventDefault(), $(a).find(".kt-input").each(function(a) {
                                        $(this).val(""), t.column($(this).data("col-index")).search("", !1, !1)
                                    }), t.table().draw(),t.table()
                                })
                        }
                        $(e).appendTo($("<th>").appendTo(a))
                    }), $("#kt_datepicker_1,#kt_datepicker_2").datepicker({
                        autoclose: true
                    })
                },
                columnDefs: [{
                    'targets': 0,
                    "orderable": false,
                    'checkboxes': {
                    'selectRow': true,
                    'selectCallback': function(){
                            //printSelectedRows();
                        }
                    }
                },{
                    targets: 1,
                    class:"text-center",
                },{
                    targets: 2,
                    class:"text-center",
                    width:"250px"
                },{
                    targets: 3,
                    "orderable": false,
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
                    targets: 9,
                    class:"text-center",
                },{
                    targets: 10,
                    "orderable": false,
                    class:"text-center",
                }]
            })
        }
    }
}();
jQuery(document).ready(function() {
    KTDatatablesSearchOptionsColumnSearch.init();
});


