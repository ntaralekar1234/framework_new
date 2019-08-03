$(document).ready(function () {

    $(".form_bal_descriptive_text").draggable({

        helper: function () {
            return getDescriptiveTextFieldHTML();
        },
        connectToSortable: ".form_builder_area"
    });
    $(".form_bal_textfield").draggable({
        helper: function () {
            return getTextFieldHTML();
        },
        connectToSortable: ".form_builder_area"

    });
    $(".form_bal_textarea").draggable({
        helper: function () {
            return getTextAreaFieldHTML();
        },
        connectToSortable: ".form_builder_area"
    });
    $(".form_bal_date").draggable({
        helper: function () {

            return getDateFieldHTML();
        },
        connectToSortable: ".form_builder_area"
    });
    $(".form_bal_select").draggable({
        helper: function () {

            return getSelectFieldHTML();
        },
        connectToSortable: ".form_builder_area"
    });
    $(".form_bal_multiselect").draggable({
        helper: function () {

            return getMultiSelectFieldHTML();
        },
        connectToSortable: ".form_builder_area"
    });
    $(".form_bal_ranklist").draggable({
        helper: function () {

            return getRankFieldHTML();
        },
        connectToSortable: ".form_builder_area"
    });
    $(".form_bal_radio").draggable({
        helper: function () {

            return getRadioFieldHTML();
        },
        connectToSortable: ".form_builder_area"
    });
    $(".form_bal_checkbox").draggable({
        helper: function () {

            return getCheckboxFieldHTML();
        },
        connectToSortable: ".form_builder_area"
    });

    $(".form_builder_area").sortable({
        cursor: 'move',
        placeholder: 'placeholder',
        start: function (e, ui) {
            ui.placeholder.height(ui.helper.outerHeight());
        },
        stop: function (ev, ui) {

            //console.log(ui.item[0].lastChild.lastChild.attributes[2].nodeValue);
            //console.log(ui.item[0].lastChild.attributes.class.ownerElement.childNodes[2]);
            if(typeof ui.item[0].lastChild.attributes.class.ownerElement.childNodes[2] === "undefined" || typeof ui.item[0].lastChild.attributes.class.ownerElement.childNodes[2].dataset.field === "undefined")
            {
                if(typeof ui.item[0].lastChild.attributes[2].nodeValue === "undefined")
                {
                    getFieldPropertise(ui.item[0].lastChild.lastChild.attributes[2].nodeValue);
                }
                if(typeof ui.item[0].lastChild.attributes[2].nodeValue !== "undefined")
                {
                    getFieldPropertise(ui.item[0].lastChild.attributes[2].nodeValue);
                }
            }
            else
            {
                getFieldPropertise(ui.item[0].lastChild.attributes.class.ownerElement.childNodes[2].dataset.field);
            }

            //getPreview();

        }

    });
    $(".form_builder_area").disableSelection();

    function generateField() {
        return Math.floor(Math.random() * (100000 - 1 + 1) + 57);
    }

    function getDescriptiveTextFieldHTML() {
        var field = generateField();
        var html = '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div></div><hr/><div class="row li_row form_output" data-type="label" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Descriptive Text</label><input type="text" name="label_' + field + '" class="form-control form_input_label" placeholder="Enter Your Descriptive Text Here" data-field="' + field + '"/></div></div>';
        return $('<div>').addClass('li_' + field + ' form_builder_field').css('max-width', '100%').html(html);
    }
    function getTextFieldHTML() {
        var field = generateField();
        var html = '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div></div><hr/><div class="row li_row form_output" data-type="text" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="text_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '" /></div></div></div>';
        return $('<div>').addClass('li_' + field + ' form_builder_field').css('max-width', '100%').html(html);
    }

    function getTextAreaFieldHTML() {
        var field = generateField();
        var html = '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div></div><hr/><div class="row li_row form_output" data-type="textarea" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="textarea_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '"/></div></div></div>';
        return $('<div>').addClass('li_' + field + ' form_builder_field').css('max-width', '100%').html(html);
    }
    function getRadioFieldHTML() {
        var field = generateField();
        var opt1 = generateField();
        var html = '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div><hr/><div class="row li_row form_output" data-type="radio" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="radio_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '"/></div></div><div class="col-md-12"><div class="form-group"><div class="mt-radio-list radio_list_' + field + '"><label class="mt-radio mt-radio-outline"><input data-opt="' + opt1 + '" type="radio" name="radio_' + field + '" > <p class="r_opt_name_' + opt1 + '">Option</p><span></span></label></div></div></div><div class="row li_row"><div class="col-md-12"><div class="field_extra_info_' + field + '"><div data-field="' + field + '" class="row radio_row_' + field + '" data-opt="' + opt1 + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="r_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="r_val form-control"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_radio" data-field="' + field + '"></i></div></div></div></div></div></div></div>';
        return $('<div>').addClass('li_' + field + ' form_builder_field').css('max-width', '100%').html(html);
    }
    function getCheckboxFieldHTML() {
        var field = generateField();
        var opt1 = generateField();
        var html = '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div><hr/><div class="row li_row form_output" data-type="checkbox" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="checkbox_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '"/></div></div><div class="col-md-12"><div class="form-group"><div class="mt-checkbox-list checkbox_list_' + field + '"><label class="mt-checkbox mt-checkbox-outline"><input data-opt="' + opt1 + '"  type="checkbox" name="checkbox_' + field + '" > <p class="c_opt_name_' + opt1 + '">Option</p><span></span></label></div></div></div><div class="row li_row"><div class="col-md-12"><div class="field_extra_info_' + field + '"><div data-field="' + field + '" class="row checkbox_row_' + field + '" data-opt="' + opt1 + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="c_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="c_val form-control"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_checkbox" data-field="' + field + '"></i></div></div></div></div></div></div></div>';
        return $('<div>').addClass('li_' + field + ' form_builder_field').css('max-width', '100%').html(html);
    }
    function getSelectFieldHTML() {
        var field = generateField();
        var opt1 = generateField();
        var html = '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div><hr/><div class="row li_row form_output" data-type="select" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="select_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '"/></div></div><div class="col-md-12"><div class="form-group"><select name="select_' + field + '" class="form-control"><option data-opt="' + opt1 + '" value="Value">Option</option></select></div></div><div class="row li_row"><div class="col-md-12"><div class="field_extra_info_' + field + '"><div data-field="' + field + '" class="row select_row_' + field + '" data-opt="' + opt1 + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="s_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="s_val form-control"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_select" data-field="' + field + '"></i></div></div></div></div></div></div></div>';
        return $('<div>').addClass('li_' + field + ' form_builder_field').css('max-width', '100%').html(html);
    }
    function getMultiSelectFieldHTML() {
        var field = generateField();
        var opt1 = generateField();
        var html = '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div><hr/><div class="row li_row form_output" data-type="multiselect" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="multiselect_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '"/></div></div><div class="col-md-12"><div class="form-group"><select name="multiselect_' + field + '[]" class="form-control" multiple="" id="multiselect_'+ field +'"><option data-opt="' + opt1 + '" value="Value">Option</option></select></div></div><div class="row li_row"><div class="col-md-12"><div class="field_extra_info_' + field + '"><div data-field="' + field + '" class="row select_row_' + field + '" data-opt="' + opt1 + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="ms_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="ms_val form-control"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_multi_select" data-field="' + field + '"></i></div></div></div></div></div></div></div>';
        return $('<div>').addClass('li_' + field + ' form_builder_field').css('max-width', '100%').html(html);
    }

    function getRankFieldHTML() {
        var field = generateField();
        var item1 = generateField();
        var html = '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div><hr/><div class="row li_row form_output" data-type="ranklist" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="ranklist_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '"/></div></div><div class="col-md-12"><div class="form-group"><ul id="ranksortable_' + field + '" class="ranksortable"><li class="ui-state-default" data-itemid="'+item1 +'"><i class="fas fa-arrows-alt-v"></i> Item 1</li></ul></div></div><div class="row li_row"><div class="col-md-12"><div class="field_extra_info_' + field + '"><div data-field="' + field + '" class="row select_row_' + field + '" data-itemid="' + item1 + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Item" class="rl_opt form-control"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_ranklist_item" data-field="' + field + '"></i></div></div></div></div></div></div></div>';
        return $('<div>').addClass('li_' + field + ' form_builder_field').css('max-width', '100%').html(html);
    }
    function getDateFieldHTML() {
        var field = generateField();
        var html = '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div></div><hr/><div class="row li_row form_output" data-type="date" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="date_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '"/></div></div></div>';
        return $('<div>').addClass('li_' + field + ' form_builder_field').css('max-width', '100%').html(html);
    }


    function getFieldPropertise(field) {

        var el =  $('.form_builder_area .form_output');
        var data_type = '';
        var label = '';
        var data_field ='';
        var html = '';

        el.each(function () {
            data_type = $(this).attr('data-type');
            data_field = $(this).attr('data-field');

            if (data_type === 'label') {
                label = ($(this).find('.form_input_label').val() != '' ?  $(this).find('.form_input_label').val() : $(this).find('.form_input_label').html());

                if(data_field == field)
                {
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div></div><hr/><div class="row li_row form_output" data-type="label" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Descriptive Text</label><input type="text" name="label_' + field + '" class="form-control form_input_label" placeholder="Enter Your Descriptive Text Here" data-field="' + field + '"/></div></div>';
                    html +='</div>';
                }
                else
                {
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row form_output" data-type="label" data-field="' + data_field + '">';
                    html+= '<div class="col-md-12">';
                    html += '<div class="form-group">';
                    html +=  '<label class="control-label form_input_label">' + label + '</label>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html +='</div>';
                }
            }
            if (data_type === 'text') {

                var name = $(this).find('.form-control').attr('name');

                label = ($(this).find('.form_input_label').val() != '' ?  $(this).find('.form_input_label').val() : $(this).find('.form_input_label').html());

                if(data_field == field)
                {
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div></div><hr/><div class="row li_row form_output" data-type="text" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="text_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '" value=""/></div></div></div>';
                    html +='</div>';
                }
                else
                {

                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row form_output" data-type="text" data-field="' + data_field + '">';
                    html+= '<div class="col-md-12">';
                    html += '<div class="form-group">';
                    html += '<label class="control-label form_input_label">' + label + '</label>';
                    html += '<input type="text" name="' + name + '" class="form-control"/>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html +='</div>';
                }

            }
            if (data_type === 'textarea') {

                var name = $(this).find('.form-control').attr('name');

                label = ($(this).find('.form_input_label').val() != '' ?  $(this).find('.form_input_label').val() : $(this).find('.form_input_label').html());

                if(data_field == field)
                {
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div></div><hr/><div class="row li_row form_output" data-type="textarea" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="textarea_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '"/></div></div></div>';
                    html +='</div>';
                }
                else
                {

                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row form_output" data-type="textarea" data-field="' + data_field + '">';
                    html+= '<div class="col-md-12">';
                    html += '<div class="form-group">';
                    html += '<label class="control-label form_input_label">' + label + '</label>';
                    html += '<textarea rows="5" name="' + name + '"class="form-control"/>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html +='</div>';
                }

            }
            if (data_type === 'radio') {

                var name = $(this).find('.form-control').attr('name');

                label = ($(this).find('.form_input_label').val() != '' ?  $(this).find('.form_input_label').val() : $(this).find('.form_input_label').html());

                if(data_field == field)
                {

                    var form_output_html = $(this).html();
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div><hr/><div class="row li_row form_output" data-type="radio" data-field="' + field + '">'+form_output_html+'</div></div>';
                    html +='</div>';
                }
                else
                {
                    var option_html = '';
                    $(this).find('.mt-radio').each(function () {

                        var option = (typeof $(this).find('p').html() != 'undefined' && $(this).find('p').html() != '' ? $(this).find('p').html() : $(this).find('.form-check-label').text());
                        var value = $(this).find('input[type=radio]').val();
                        option_html += '<div class="form-check mt-radio"><label class="form-check-label"><input type="radio" class="form-check-input" name="' + name + '" value="' + value + '">' + option + '</label></div>';
                    });
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row form_output" data-type="radio" data-field="' + data_field + '">';
                    html+= '<div class="col-md-12">';
                    html += '<div class="form-group">';
                    html += '<label class="control-label form_input_label">' + label + '</label>';
                    html += option_html;
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html +='</div>';
                }

            }

            if (data_type === 'checkbox') {

                var name = $(this).find('.form-control').attr('name');

                label = ($(this).find('.form_input_label').val() != '' ?  $(this).find('.form_input_label').val() : $(this).find('.form_input_label').html());

                if(data_field == field)
                {

                    var form_output_html = $(this).html();
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div><hr/><div class="row li_row form_output" data-type="checkbox" data-field="' + field + '">'+form_output_html+'</div></div>';
                    html +='</div>';
                }
                else
                {
                    var option_html = '';
                    $(this).find('.mt-checkbox').each(function () {

                        var option = (typeof $(this).find('p').html() != 'undefined' && $(this).find('p').html() != '' ? $(this).find('p').html() : $(this).find('.form-check-label').text());
                        var value = $(this).find('input[type=checkbox]').val();
                        option_html += '<div class="form-check mt-checkbox"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="' + name + '" value="' + value + '">' + option + '</label></div>';
                    });
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row form_output" data-type="checkbox" data-field="' + data_field + '">';
                    html+= '<div class="col-md-12">';
                    html += '<div class="form-group">';
                    html += '<label class="control-label form_input_label">' + label + '</label>';
                    html += option_html;
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html +='</div>';
                }

            }
            if (data_type === 'select') {

                var name = $(this).find('.form-control').attr('name');

                label = ($(this).find('.form_input_label').val() != '' ?  $(this).find('.form_input_label').val() : $(this).find('.form_input_label').html());

                if(data_field == field)
                {

                    var form_output_html = $(this).html();

                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div><hr/><div class="row li_row form_output" data-type="select" data-field="' + field + '">'+form_output_html+'</div></div>';
                    html +='</div>';
                }
                else
                {
                    var option_html = '';

                    $(this).find('select option').each(function () {

                        var option = $(this).html();
                        var value = $(this).val();
                        option_html += '<option value="' + value + '">' + option + '</option>';
                    });
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row form_output" data-type="select" data-field="' + data_field + '">';
                    html+= '<div class="col-md-12">';
                    html += '<div class="form-group">';
                    html += '<label class="control-label form_input_label">' + label + '</label>';
                    html += '<select class="form-control" name="' + name + '">' + option_html + '</select>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html +='</div>';
                }

            }
            if (data_type === 'multiselect') {

                var name = $(this).find('.form-control').attr('name');

                label = ($(this).find('.form_input_label').val() != '' ?  $(this).find('.form_input_label').val() : $(this).find('.form_input_label').html());

                if(data_field == field)
                {

                    var form_output_html = $(this).html();

                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div><hr/><div class="row li_row form_output" data-type="multiselect" data-field="' + field + '">'+form_output_html+'</div></div>';
                    html +='</div>';
                }
                else
                {
                    var option_html = '';

                    $(this).find('select option').each(function () {

                        var option = $(this).html();
                        var value = $(this).val();
                        option_html += '<option value="' + value + '">' + option + '</option>';
                    });
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row form_output" data-type="multiselect" data-field="' + data_field + '">';
                    html+= '<div class="col-md-12">';
                    html += '<div class="form-group">';
                    html += '<label class="control-label form_input_label">' + label + '</label>';
                    html += '<select class="form-control m-bootstrap-select m_selectpicker" name="' + name + '" multiple>' + option_html + '</select>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html +='</div>';
                }

            }
            if (data_type === 'ranklist') {

                var name = $(this).find('.form-control').attr('name');

                label = ($(this).find('.form_input_label').val() != '' ?  $(this).find('.form_input_label').val() : $(this).find('.form_input_label').html());

                if(data_field == field)
                {

                    var form_output_html = $(this).html();

                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div><hr/><div class="row li_row form_output" data-type="ranklist" data-field="' + field + '">'+form_output_html+'</div></div>';
                    html +='</div>';
                }
                else
                {
                    var list_html = '';
                    $(this).find('ul li').each(function () {
                        var item = $(this).html();
                        list_html += '<li class="ui-state-default">'+item+'</li>';
                    });
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row form_output" data-type="ranklist" data-field="' + data_field + '">';
                    html+= '<div class="col-md-12">';
                    html += '<div class="form-group">';
                    html += '<label class="control-label form_input_label">' + label + '</label>';
                    html += '<ul class="ranksortable">'+list_html+'</ul>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html +='</div>';
                }

            }
            if (data_type === 'date') {

                var name = $(this).find('.form-control').attr('name');

                label = ($(this).find('.form_input_label').val() != '' ?  $(this).find('.form_input_label').val() : $(this).find('.form_input_label').html());

                if(data_field == field)
                {
                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row"><div class="col-md-12"><button type="button" class="btn btn-primary btn-sm remove_bal_field pull-right" data-field="' + field + '"><i class="fa fa-times"></i></button><button type="button" class="btn btn-info btn-sm save_bal_field pull-right mr-2" data-field="' + field + '"><i class="fa fa-save"></i></button></div></div></div><hr/><div class="row li_row form_output" data-type="date" data-field="' + field + '"><div class="col-md-12"><div class="form-group"><label class="control-label">Question</label><input type="text" name="date_' + field + '" class="form-control form_input_label" placeholder="Enter Your Question Here" data-field="' + field + '" value=""/></div></div></div>';
                    html +='</div>';
                }
                else
                {

                    html +='<div class="li_'+data_field+' form_builder_field" style="max-width:100%">';
                    html += '<div class="all_div"><div class="row li_row form_output" data-type="date" data-field="' + data_field + '">';
                    html+= '<div class="col-md-12">';
                    html += '<div class="form-group">';
                    html += '<label class="control-label form_input_label">' + label + '</label>';
                    html += '<input type="date" name="' + name + '" class="form-control"/>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html +='</div>';
                }

            }
        });

        $('.form_builder_area').html();
        $('.form_builder_area').html(html);

        $(document).find(".ranksortable").sortable({
	    	cancel: ".unsortable"
        });
        $(document).find(".ranksortable").disableSelection();
        $(document).find(".m_selectpicker").selectpicker();
    }

    $(document).on('click', '.remove_bal_field', function (e) {
        e.preventDefault();
        var field = $(this).attr('data-field');
        $(this).closest('.li_' + field).hide('400', function () {
            $(this).remove();
            getFieldPropertise(0);
        });
    });

    $(document).on('click', '.remove_more_radio', function () {
        var field = $(this).attr('data-field');
        $(this).closest('.radio_row_' + field).hide('400', function () {
            $(this).remove();
            var options = '';
            $('.radio_row_' + field).each(function () {
                var opt = $(this).find('.r_opt').val();
                var val = $(this).find('.r_val').val();
                var s_opt = $(this).attr('data-opt');
                options += '<label class="mt-radio mt-radio-outline"><input data-opt="' + s_opt + '" type="radio" name="radio_' + field + '" value="' + val + '"> <p class="r_opt_name_' + s_opt + '">' + opt + '</p><span></span></label>';
            });
            $('.radio_list_' + field).html(options);

        });
    });

    $(document).on('click', '.remove_more_checkbox', function () {
        var field = $(this).attr('data-field');
        $(this).closest('.checkbox_row_' + field).hide('400', function () {
            $(this).remove();
            var options = '';
            $('.checkbox_row_' + field).each(function () {
                var opt = $(this).find('.c_opt').val();
                var val = $(this).find('.c_val').val();
                var s_opt = $(this).attr('data-opt');
                options += '<label class="mt-checkbox mt-checkbox-outline"><input data-opt="' + s_opt + '" name="checkbox_' + field + '" type="checkbox" value="' + val + '"> <p class="r_opt_name_' + s_opt + '">' + opt + '</p><span></span></label>';
            });
            $('.checkbox_list_' + field).html(options);

        });
    });

    $(document).on('click', '.remove_more_select', function () {
        var field = $(this).attr('data-field');
        $(this).closest('.select_row_' + field).hide('400', function () {
            $(this).remove();
            var options = '';
            $('.select_row_' + field).each(function () {
                var opt = $(this).find('.s_opt').val();
                var val = $(this).find('.s_val').val();
                var s_opt = $(this).attr('data-opt');
                options += '<option data-opt="' + s_opt + '" value="' + val + '">' + opt + '</option>';
            });
            $('select[name=select_' + field + ']').html(options);

        });
    });
    $(document).on('click', '.remove_more_multi_select', function () {
        var field = $(this).attr('data-field');
        $(this).closest('.select_row_' + field).hide('400', function () {
            $(this).remove();
            var options = '';
            $('.select_row_' + field).each(function () {
                var opt = $(this).find('.ms_opt').val();
                var val = $(this).find('.ms_val').val();
                var s_opt = $(this).attr('data-opt');
                options += '<option data-opt="' + s_opt + '" value="' + val + '">' + opt + '</option>';
            });
            $('#multiselect_' + field).html(options);
        });
    });
    $(document).on('click', '.remove_more_ranklist_item', function () {
        var field = $(this).attr('data-field');
        $(this).closest('.select_row_' + field).hide('400', function () {
            $(this).remove();
            var items = '';
            $('.select_row_' + field).each(function () {
                var opt = $(this).find('.rl_opt').val();
                var s_opt = $(this).attr('data-itemid');
                items += '<li class="ui-state-default" data-itemid="'+s_opt +'"><i class="fas fa-arrows-alt-v"></i> '+opt+'</li>';
            });
            $('#ranksortable_' + field).html(items);
        });
    });

    $(document).on('click', '.add_more_radio', function () {
        $(this).closest('.form_builder_field').css('height', 'auto');
        var field = $(this).attr('data-field');
        var option = generateField();
        $('.field_extra_info_' + field).append('<div data-opt="' + option + '" data-field="' + field + '" class="row radio_row_' + field + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="r_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="r_val form-control"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_radio" data-field="' + field + '"></i><i class="margin-top-5 margin-left-5 fa fa-times-circle default_red fa-2x remove_more_radio" data-field="' + field + '"></i></div></div>');
        var options = '';
        $('.radio_row_' + field).each(function () {
            var opt = $(this).find('.r_opt').val();
            var val = $(this).find('.r_val').val();
            var s_opt = $(this).attr('data-opt');
            options += '<label class="mt-radio mt-radio-outline"><input data-opt="' + s_opt + '" type="radio" name="radio_' + field + '" value="' + val + '"> <p class="r_opt_name_' + s_opt + '">' + opt + '</p><span></span></label>';
        });
        $('.radio_list_' + field).html(options);
    });

    $(document).on('click', '.add_more_checkbox', function () {
        $(this).closest('.form_builder_field').css('height', 'auto');
        var field = $(this).attr('data-field');
        var option = generateField();
        $('.field_extra_info_' + field).append('<div data-opt="' + option + '" data-field="' + field + '" class="row checkbox_row_' + field + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="c_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="c_val form-control"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_checkbox" data-field="' + field + '"></i><i class="margin-top-5 margin-left-5 fa fa-times-circle default_red fa-2x remove_more_checkbox" data-field="' + field + '"></i></div></div>');
        var options = '';
        $('.checkbox_row_' + field).each(function () {
            var opt = $(this).find('.c_opt').val();
            var val = $(this).find('.c_val').val();
            var s_opt = $(this).attr('data-opt');
            options += '<label class="mt-checkbox mt-checkbox-outline"><input data-opt="' + s_opt + '" name="checkbox_' + field + '" type="checkbox" value="' + val + '"> <p class="c_opt_name_' + s_opt + '">' + opt + '</p><span></span></label>';
        });

        $('.checkbox_list_' + field).html(options);

    });
    $(document).on('click', '.add_more_select', function () {
        $(this).closest('.form_builder_field').css('height', 'auto');
        var field = $(this).attr('data-field');
        var option = generateField();
        $('.field_extra_info_' + field).append('<div data-field="' + field + '" class="row select_row_' + field + '" data-opt="' + option + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="s_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="s_val form-control"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_select" data-field="' + field + '"></i><i class="margin-top-5 margin-left-5 fa fa-times-circle default_red fa-2x remove_more_select" data-field="' + field + '"></i></div></div>');
        var options = '';
        $('.select_row_' + field).each(function () {
            var opt = $(this).find('.s_opt').val();
            var val = $(this).find('.s_val').val();
            var s_opt = $(this).attr('data-opt');
            options += '<option data-opt="' + s_opt + '" value="' + val + '">' + opt + '</option>';
        });
        $('select[name=select_' + field + ']').html(options);

    });
    $(document).on('click', '.add_more_multi_select', function () {
        $(this).closest('.form_builder_field').css('height', 'auto');
        var field = $(this).attr('data-field');
        var option = generateField();
        $('.field_extra_info_' + field).append('<div data-field="' + field + '" class="row select_row_' + field + '" data-opt="' + option + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Option" class="ms_opt form-control"/></div></div><div class="col-md-4"><div class="form-group"><input type="text" value="Value" class="ms_val form-control"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_multi_select" data-field="' + field + '"></i><i class="margin-top-5 margin-left-5 fa fa-times-circle default_red fa-2x remove_more_multi_select" data-field="' + field + '"></i></div></div>');
        var options = '';
        $('.select_row_' + field).each(function () {
            var opt = $(this).find('.ms_opt').val();
            var val = $(this).find('.ms_val').val();
            var s_opt = $(this).attr('data-opt');
            options += '<option data-opt="' + s_opt + '" value="' + val + '">' + opt + '</option>';
        });
        $('#multiselect_' + field).html(options);
    });

    $(document).on('click', '.add_more_ranklist_item', function () {
        $(this).closest('.form_builder_field').css('height', 'auto');
        var field = $(this).attr('data-field');

        var item = generateField();
        $('.field_extra_info_' + field).append('<div data-field="' + field + '" class="row select_row_' + field + '" data-itemid="' + item + '"><div class="col-md-4"><div class="form-group"><input type="text" value="Item2" class="rl_opt form-control"/></div></div><div class="col-md-4"><i class="margin-top-5 fa fa-plus-circle fa-2x default_blue add_more_ranklist_item" data-field="' + field + '"></i><i class="margin-top-5 margin-left-5 fa fa-times-circle default_red fa-2x remove_more_ranklist_item" data-field="' + field + '"></i></div></div>');
        var items = '';
        $('.select_row_' + field).each(function () {
            var opt = $(this).find('.rl_opt').val();
            var s_opt = $(this).attr('data-itemid');
            items += '<li class="ui-state-default" data-itemid="'+s_opt +'"><i class="fas fa-arrows-alt-v"></i> '+opt+'</li>';
        });
        $('#ranksortable_' + field).html(items);
    });

    $(document).on('keyup', '.r_opt', function () {
        var op_val = $(this).val();
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.radio_list_' + field).find('.r_opt_name_' + option).html(op_val);

    });
    $(document).on('keyup', '.r_val', function () {
        var op_val = $(this).val();
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.radio_list_' + field).find('input[data-opt=' + option + ']').val(op_val);

    });

    $(document).on('keyup', '.c_opt', function () {
        var op_val = $(this).val();
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.checkbox_list_' + field).find('.c_opt_name_' + option).html(op_val);

    });
    $(document).on('keyup', '.c_val', function () {
        var op_val = $(this).val();
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('.checkbox_list_' + field).find('input[data-opt=' + option + ']').val(op_val);

    });
    $(document).on('keyup', '.s_opt', function () {
        var op_val = $(this).val();
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('select[name=select_' + field + ']').find('option[data-opt=' + option + ']').html(op_val);

    });
    $(document).on('keyup', '.s_val', function () {
        var op_val = $(this).val();
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('select[name=select_' + field + ']').find('option[data-opt=' + option + ']').val(op_val);

    });
    $(document).on('keyup', '.ms_opt', function () {
        var op_val = $(this).val();
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('#multiselect_' + field).find('option[data-opt=' + option + ']').html(op_val);
    });
    $(document).on('keyup', '.ms_val', function () {
        var op_val = $(this).val();
        var field = $(this).closest('.row').attr('data-field');
        var option = $(this).closest('.row').attr('data-opt');
        $('#multiselect_' + field).find('option[data-opt=' + option + ']').val(op_val);
    });
    $(document).on('keyup', '.rl_opt', function () {
        var rl_val = $(this).val();
        var field = $(this).closest('.row').attr('data-field');
        var itemid = $(this).closest('.row').attr('data-itemid');

        $('#ranksortable_' + field).find('li[data-itemid=' + itemid + ']').html('<i class="fas fa-arrows-alt-v"></i> '+rl_val);
    });

    $(document).on('click', '.save_bal_field', function () {
        var field = $(this).attr('data-field');

        var el = $('.li_' + field + ' .form_output');
        var label = '';
        el.each(function () {
            label = $(this).find('.form_input_label').val();
        })
        if(label.trim() == '')
        {
            $('.form_input_label').focus();
            return false;
        }
        else
        {
            getFieldPropertise(0);
        }

    });
     $(document).on('click', '.edit_bal_field', function () {
         var field = $(this).attr('data-field');
         getFieldPropertise(field);
     });


    $(document).on('click', '.export_html', function () {
        getPreview('html');
    });
    $(document).on('click', '.preview_html', function () {
        getPreview();
    });

    function getPreviewJson() {
        var el = $('.form_builder_area .form_output');

        var jsondata = [];
        el.each(function () {
            var data_type = $(this).attr('data-type');

           /*  var label_style =$(this).find('.form_input_label').attr('style');
            var input_pattern = $(this).find('.form_input_name').attr('pattern');
            var input_title = $(this).find('.form_input_name').attr('title'); */

            var name = $(this).find('.form-control').attr('name');

            var label = ($(this).find('.form_input_label').val() != '' ?  $(this).find('.form_input_label').val() : $(this).find('.form_input_label').html());
            if (data_type === 'label') {

                json = { "type": data_type, "label": label};
                jsondata.push(json);
            }
            if (data_type === 'text') {

                json = { "type": data_type, "label": label, "name": name};
                jsondata.push(json);
            }
            if (data_type === 'textarea') {

                json = { "type": data_type, "label": label, "name": name};
                jsondata.push(json);
            }
            if (data_type === 'date') {

                json = { "type": data_type, "label": label,"name": name};
                jsondata.push(json);
            }
            if (data_type === 'select') {
                var option_html = [];
                $(this).find('select option').each(function () {
                    var option = $(this).html();
                    var value = $(this).val();
                    options = { "value": value, "option": option };
                    option_html.push(options);

                });

                json = { "type": data_type, "label": label, "name": name,"option": option_html};
                jsondata.push(json);

            }
            if (data_type === 'multiselect') {
                var option_html = [];

                $(this).find('select option').each(function () {
                    var option = $(this).html();
                    var value = $(this).val();
                    options = { "value": value, "option": option };
                    option_html.push(options);

                });
                name = $(this).find('.m_selectpicker').attr('name');
                json = { "type": data_type, "label": label, "name": name, "option": option_html};
                jsondata.push(json);

            }
            if (data_type === 'ranklist') {
                var item_html = [];
                $(this).find('ul li').each(function () {
                    var item = $(this).html();
                    items = { "item": item};
                    item_html.push(items);
                });

                json = { "type": data_type, "label": label,"option": item_html};
                jsondata.push(json);

            }
            if (data_type === 'radio') {
                var option_html = [];
                $(this).find('.mt-radio').each(function () {
                    var option =(typeof $(this).find('p').html() != 'undefined' && $(this).find('p').html() != '' ? $(this).find('p').html() : $(this).find('.form-check-label').text());
                    var value = $(this).find('input[type=radio]').val();
                    name = $(this).find('.form-check-input').attr('name');
                    options = { "value": value, "option": option, "name": name};
                    option_html.push(options);
                });

                json = { "type": data_type, "label": label, "option": option_html};
                jsondata.push(json);
            }
            if (data_type === 'checkbox') {
                var option_html = [];
                $(this).find('.mt-checkbox').each(function () {
                    var option = (typeof $(this).find('p').html() != 'undefined' && $(this).find('p').html() != '' ? $(this).find('p').html() : $(this).find('.form-check-label').text());
                    var value = $(this).find('input[type=checkbox]').val();
                    name = $(this).find('.form-check-input').attr('name');
                    options = { "value": value, "option": option, "name": name};
                    option_html.push(options);
                });

                json = { "type": data_type, "label": label, "option": option_html};
                jsondata.push(json);
            }
        });


        return jsondata;



    }


    $(document).on('click', '.quick-send', function () {
        var url = $("#base_url").val();
        var form_id = $('#form-id').val();
        var jsonData = getPreviewJson();
        if(form_id.trim() == '')
        {
            $('#form-id').focus();
            return false;
        }
        else if(jsonData.length == 0)
        {
            swal("Fill the form field !!");
            return false;
        }
        else
        {

            var postdata = {'form_id':form_id,'jsonData':jsonData}

            swal({
                title: 'Are you sure?',
                text: "You want to Save this Form ?",
                icon: 'warning',
                buttons: {
                    catch: {
                      text: "'Yes, Save it!",
                      value: "true",
                    },
                    cancel: "No, Cancel!",

                  },

              }).then((result) => {

                if (result) {

                      $.ajax({
                      url : url + "save_json_form",
                      data : postdata,
                      dataType:'json',
                      type : 'post',
                      async : false,
                      success : function(data){
                          if(data.success == true){

                              swal({
                                position: 'top',
                                icon: 'success',
                                title: data.message,
                                Button: true,
                              }).then((result) => {
                                //location.reload();
                              });

                          }else{
                              swal({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.message,
                              });
                          }

                      }
                  });

                } else{
                  swal(
                    'Cancelled',
                    'Nothing has been Changed :)',
                    'error'
                  )
                }

              });
        }
    });

    $(document).on('click', '#add_form_header', function () {
        var url = $("#base_url").val();
        var form_id = $('#form-id').val();
        var form_header = $("#form-header").val();
        if(form_id.trim() == '')
        {
            $('#form-id').focus();
            return false;
        }
        else if(form_header.trim() == '')
        {
            $('#form-header').focus();
            return false;
        }
        else
        {

            var postdata = {'form_id':form_id,'form_header':form_header}
            $.ajax({
                url : url + "save_form_header",
                data : postdata,
                dataType:'json',
                type : 'post',
                async : false,
                success : function(data){
                    if(data.success == true){

                        swal({
                        position: 'top',
                        icon: 'success',
                        title: data.message,
                        Button: true,
                        }).then((result) => {
                        //location.reload();
                        });

                    }else{
                        swal({
                        type: 'error',
                        title: 'Oops...',
                        text: data.message,
                        });
                    }

                }
            });
        }
    });

    $(document).on('click', '#add_form_footer', function () {
        var url = $("#base_url").val();
        var form_id = $('#form-id').val();
        var form_footer = $("#form-footer").val();
        if(form_id.trim() == '')
        {
            $('#form-id').focus();
            return false;
        }
        else if(form_footer.trim() == '')
        {
            $('#form-footer').focus();
            return false;
        }
        else
        {

            var postdata = {'form_id':form_id,'form_footer':form_footer}
            $.ajax({
                url : url + "save_form_footer",
                data : postdata,
                dataType:'json',
                type : 'post',
                async : false,
                success : function(data){
                    if(data.success == true){

                        swal({
                        position: 'top',
                        icon: 'success',
                        title: data.message,
                        Button: true,
                        }).then((result) => {
                        //location.reload();
                        });

                    }else{
                        swal({
                        type: 'error',
                        title: 'Oops...',
                        text: data.message,
                        });
                    }

                }
            });
        }
    });
});











