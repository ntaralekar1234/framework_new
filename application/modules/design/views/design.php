<div class="topbar-tabs">
    <input type="hidden" id="form-id" value="<?php echo $form_id;?>">
    <div class="topbar-tabs-ul-wrapper">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?php echo($active == 'design' ? 'active show' : ''); ?>"
                    href="<?php echo base_url('design'); ?>" role="tab" aria-controls="design"
                    aria-selected="false">Design</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo($active == 'distribute' ? 'active show' : ''); ?>"
                    href="<?php echo base_url('distribute'); ?>" role="tab" aria-controls="distribute"
                    aria-selected="false">Distribute</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo($active == 'report' ? 'active show' : ''); ?>"
                    href="<?php echo base_url('report'); ?>" role="tab" aria-controls="contact"
                    aria-selected="true">Report</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo($active == 'data' ? 'active show' : ''); ?>"
                    href="<?php echo base_url('data'); ?>" role="tab" aria-controls="data" aria-selected="true">Data</a>
            </li>
        </ul>

        <!-- <div class="topbar-create-survey"><button class="btn btn-sm btn-success">Create
                Survey</button></div> -->
    </div>

    <div class="tab-content" id="topbar-tabs-content">
        <div class="tab-pane fade p-0 active show" id="design" role="tabpanel" aria-labelledby="design-tab">
            <div class="inner-fields-filter">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-info btn-sm">Designer</button>
                    <button type="button" class="btn btn-info btn-fields-filter btn-sm" data-toggle="modal"
                        data-target="#visual-setting-modal">Visual
                        Settings</button>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button"
                            class="btn btn-info btn-fields-filter btn-sm dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="" data-toggle="modal"
                                data-target="#survey-details-modal">Survey
                                Details</a>
                            <a class="dropdown-item" href="" data-toggle="modal"
                                data-target="#display-option-modal">Display
                                Option</a>
                            <a class="dropdown-item" href="#">Event
                                Message</a>
                            <a class="dropdown-item" href="#">Save &amp;
                                Continue Later</a>
                            <a class="dropdown-item" href="#">Thank You
                                Page</a>
                            <a class="dropdown-item" href="#">Print
                                Option</a>
                            <a class="dropdown-item" href="#">Expiry
                                Rules</a>
                        </div>
                    </div>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-info btn-fields-filter btn-sm">Rearrange
                        Questions</button>
                    <button type="button" class="btn btn-info btn-fields-filter btn-sm">Questions
                        Sequence</button>
                </div>
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button"
                        class="btn btn-info btn-fields-filter btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Instant Alert
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="#">Instant Thanks</a>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button"
                        class="btn btn-info btn-fields-filter btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Logic
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="#">Question Display
                            Logic
                            <span data-toggle="tooltip" data-placement="bottom"
                                title="Depending on a participant's response to an earlier question, show or hide a related question on the same page or a later page.">
                                <i class="fas fa-info-circle"></i>
                            </span>
                        </a>
                        <a class="dropdown-item" href="#">Single Question
                            Branching
                            <span data-toggle="tooltip" data-placement="bottom"
                                title="Direct participants to certain pages in the survey based on a response to a single question.">
                                <i class="fas fa-info-circle"></i>
                            </span>
                        </a>
                        <a class="dropdown-item" href="#">Multi Question
                            Branching
                            <span data-toggle="tooltip" data-placement="bottom"
                                title="Direct participants to certain pages in the survey based on their responses to multiple questions.">
                                <i class="fas fa-info-circle"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="preview-export-group">
                    <span class="preview-export-span quick-invite" data-toggle="tooltip" data-placement="bottom"
                        title="Quick Export"><i class="fas fa-envelope-open-text"></i></span>
                    <span class="preview-export-span quick-send" data-toggle="tooltip" data-placement="bottom"
                        title="Quick Send"><i class="fas fa-paper-plane"></i></span>
                    <span class="preview-export-span quick-preview preview_html" data-toggle="tooltip"
                        data-placement="bottom" title="Quick Preview"><i class="fas fa-eye"></i></span>
                </div>
            </div>
            <div class="survey-tabs-inner">
                <div class="design-sidebar">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading-simple-question">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#simple-question-tab" aria-expanded="true"
                                        aria-controls="simple-question-tab">
                                        Simple Questions
                                    </a>
                                </h4>
                            </div>
                            <div id="simple-question-tab" class="panel-collapse collapse in show" role="tabpanel"
                                aria-labelledby="heading-simple-question">
                                <div class="panel-body">
                                    <div class="qu-type-btns">
                                        <div class="fl">
                                            <a href="javascript:void(0);" id="welcome-banner-btn"
                                                class="welcome-banner-btn ResBtnq ManPrjBtn"><i class="fa fa-pause"></i>
                                                <span>Welcome
                                                    Banner</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Welcome Banner</div><img src='assets/img/welcome-screen.jpg' class='nav-popover-img'/><p class='nav-popover-content'>The first thing your audience will see a great opportunity to engage right away.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl form_bal_descriptive_text">
                                            <a href="javascript:void(0);" id="" class="ResBtnq ManPrjBtn" onclick=""><i
                                                    class="fa fa-play"></i>
                                                <span>Descriptive
                                                    Text</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Symbol Rating Scale</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl form_bal_textfield">
                                            <a href="javascript:void(0);" id="text-input-btn"
                                                class="ResBtnq ManPrjBtn text-input-btn"><i class="fa fa-save"></i>
                                                <span>Text
                                                    Box</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Text Box</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Good for short answers, like names and what you had for breakfast.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl form_bal_textarea">
                                            <a href="javascript:void(0);" id="text-input-btn"
                                                class="ResBtnq ManPrjBtn text-input-btn"><i class="fa fa-save"></i>
                                                <span>Text Area</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Text Box</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Good for short answers, like names and what you had for breakfast.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl form_bal_radio">
                                            <a href="javascript:void(0);" id="radio-input-btn"
                                                class="ResBtnq ManPrjBtn radio-input-btn" onclick=""><i
                                                    class="fa fa-repeat"></i>
                                                <span>Radio
                                                    Button</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Radio Button</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl form_bal_checkbox">
                                            <a href="javascript:void(0);" id="checkbox-input-btn"
                                                class="ResBtnq ManPrjBtn checkbox-input-btn" onclick=""><i
                                                    class="fa fa-play"></i>
                                                <span>Check
                                                    Box</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Check Box</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl form_bal_select">
                                            <a href="javascript:void(0);" id="dropdown-input-btn"
                                                class="ResBtnq ManPrjBtn dropdown-input-btn" onclick=""><i
                                                    class="fa fa-pause"></i>
                                                <span>Dropdown</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Dropdown</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl form_bal_multiselect">
                                            <a href="javascript:void(0);" id="multiple-dropdown-btn"
                                                class="multiple-dropdown-btn ResBtnq ManPrjBtn"><i
                                                    class="fa fa-pause"></i>
                                                <span>Multiple
                                                    Dropdown</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Multiple Dropdown</div><img src='assets/img/welcome-screen.jpg' class='nav-popover-img'/><p class='nav-popover-content'>The first thing your audience will see a great opportunity to engage right away.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl form_bal_ranklist">
                                            <a href="javascript:void(0);" id="ranking-input-btn"
                                                class="ResBtnq ManPrjBtn ranking-input-btn" onclick=""><i
                                                    class="fa fa-play"></i>
                                                <span>Ranking</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Ranking</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl form_bal_date">
                                            <a href="javascript:void(0);" id="date-input-btn"
                                                class="ResBtnq ManPrjBtn date-input-btn" onclick=""><i
                                                    class="fa fa-play"></i>
                                                <span>Date</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Date</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl">
                                            <a href="javascript:void(0);" id="scale-input-btn"
                                                class="ResBtnq ManPrjBtn scale-input-btn" onclick=""><i
                                                    class="fa fa-repeat"></i>
                                                <span>Rating
                                                    Scale</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Rating Scale</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl">
                                            <a href="javascript:void(0);" id="image-choice-btn"
                                                class="ResBtnq ManPrjBtn image-choice-btn" onclick=""><i
                                                    class="fa fa-play"></i>
                                                <span>Image
                                                    Choice</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Image Choice</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl">
                                            <a href="javascript:void(0);" id="" class="ResBtnq ManPrjBtn" onclick=""><i
                                                    class="fa fa-save"></i>
                                                <span>Demographics</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Demographics</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                        <div class="fl">
                                            <a href="javascript:void(0);" id="" class="ResBtnq ManPrjBtn" onclick=""><i
                                                    class="fa fa-play"></i>
                                                <span>Symbol
                                                    Rating
                                                    Scale</span>
                                                <div class="clr">
                                                </div>
                                                <span class="about-question" data-toggle="popover" data-trigger="hover"
                                                    data-container="body" title="" data-html="true"
                                                    data-content="<div class='nav-popover-heading'>Symbol Rating Scale</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                        class="fa fa-info"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading-grid-question">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#grid-question-tab" aria-expanded="true"
                                        aria-controls="grid-question-tab">
                                        Grid Questions
                                    </a>
                                </h4>
                            </div>
                            <div id="grid-question-tab" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="heading-grid-question">
                                <div class="panel-body">
                                    <div class="panel-body">
                                        <div class="qu-type-btns">
                                            <div class="fl">
                                                <a href="javascript:void(0);" id="multiple-text-box-btn"
                                                    class="multiple-text-box-btn ResBtnq ManPrjBtn"><i
                                                        class="fa fa-pause"></i>
                                                    <span>Multiple
                                                        Text
                                                        Box</span>
                                                    <div class="clr">
                                                    </div>
                                                    <span class="about-question" data-toggle="popover"
                                                        data-trigger="hover" data-container="body" title=""
                                                        data-html="true"
                                                        data-content="<div class='nav-popover-heading'>Multiple Text Box</div><img src='assets/img/welcome-screen.jpg' class='nav-popover-img'/><p class='nav-popover-content'>The first thing your audience will see a great opportunity to engage right away.</p>"><i
                                                            class="fa fa-info"></i></span>
                                                </a>
                                            </div>
                                            <div class="fl">
                                                <a href="javascript:void(0);" id="multiple-dropdown-btn"
                                                    class="multiple-dropdown-btn ResBtnq ManPrjBtn"><i
                                                        class="fa fa-pause"></i>
                                                    <span>Multiple
                                                        Dropdown</span>
                                                    <div class="clr">
                                                    </div>
                                                    <span class="about-question" data-toggle="popover"
                                                        data-trigger="hover" data-container="body" title=""
                                                        data-html="true"
                                                        data-content="<div class='nav-popover-heading'>Multiple Dropdown</div><img src='assets/img/welcome-screen.jpg' class='nav-popover-img'/><p class='nav-popover-content'>The first thing your audience will see a great opportunity to engage right away.</p>"><i
                                                            class="fa fa-info"></i></span>
                                                </a>
                                            </div>
                                            <div class="fl">
                                                <a href="javascript:void(0);" id="multiple-radio-btn"
                                                    class="multiple-radio-btn ResBtnq ManPrjBtn"><i
                                                        class="fa fa-pause"></i>
                                                    <span>Multiple
                                                        Radio</span>
                                                    <div class="clr">
                                                    </div>
                                                    <span class="about-question" data-toggle="popover"
                                                        data-trigger="hover" data-container="body" title=""
                                                        data-html="true"
                                                        data-content="<div class='nav-popover-heading'>Multiple Radio</div><img src='assets/img/welcome-screen.jpg' class='nav-popover-img'/><p class='nav-popover-content'>The first thing your audience will see a great opportunity to engage right away.</p>"><i
                                                            class="fa fa-info"></i></span>
                                                </a>
                                            </div>
                                            <div class="fl">
                                                <a href="javascript:void(0);" id="multiple-checkbox-btn"
                                                    class="multiple-checkbox-btn ResBtnq ManPrjBtn"><i
                                                        class="fa fa-pause"></i>
                                                    <span>Multiple
                                                        Checkbox</span>
                                                    <div class="clr">
                                                    </div>
                                                    <span class="about-question" data-toggle="popover"
                                                        data-trigger="hover" data-container="body" title=""
                                                        data-html="true"
                                                        data-content="<div class='nav-popover-heading'>Multiple Checkbox</div><img src='assets/img/welcome-screen.jpg' class='nav-popover-img'/><p class='nav-popover-content'>The first thing your audience will see a great opportunity to engage right away.</p>"><i
                                                            class="fa fa-info"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading-other-question">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#other-question-tab" aria-expanded="true"
                                        aria-controls="other-question-tab">
                                        Other Questions
                                    </a>
                                </h4>
                            </div>
                            <div id="other-question-tab" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="heading-other-question">
                                <div class="panel-body">
                                    <div class="panel-body">
                                        <div class="qu-type-btns">
                                            <div class="fl">
                                                <a href="javascript:void(0);" id="captcha-btn"
                                                    class="captcha-btn ResBtnq ManPrjBtn"><i class="fa fa-pause"></i>
                                                    <span>Captcha</span>
                                                    <div class="clr">
                                                    </div>
                                                    <span class="about-question" data-toggle="popover"
                                                        data-trigger="hover" data-container="body" title=""
                                                        data-html="true"
                                                        data-content="<div class='nav-popover-heading'>Captcha</div><img src='assets/img/welcome-screen.jpg' class='nav-popover-img'/><p class='nav-popover-content'>The first thing your audience will see a great opportunity to engage right away.</p>"><i
                                                            class="fa fa-info"></i></span>
                                                </a>
                                            </div>
                                            <div class="fl">
                                                <a href="javascript:void(0);" id="page-break-btn"
                                                    class="page-break-btn ResBtnq ManPrjBtn" onclick=""><i
                                                        class="fa fa-play"></i>
                                                    <span>Page
                                                        Break</span>
                                                    <div class="clr">
                                                    </div>
                                                    <span class="about-question" data-toggle="popover"
                                                        data-trigger="hover" data-container="body" title=""
                                                        data-html="true"
                                                        data-content="<div class='nav-popover-heading'>Page Break</div><img src='assets/img/short-question.jpg' class='nav-popover-img'/><p class='nav-popover-content'>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>"><i
                                                            class="fa fa-info"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="design-form-wrapper">
                    <div class="row">
                        <div class="upload-sec col-12 ">
                            <div class="card ">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="logoupld col-12 ">
                                            <div class="add-element">
                                                <div class="element-header">
                                                    <div class="float-left">
                                                        <a data-collapse="#mycard-collapse" class="btn btn-icon"><i
                                                                class="ion ion-plus"></i>
                                                        </a>
                                                    </div>
                                                    <h4> Add
                                                        Survey
                                                        Logo
                                                    </h4>
                                                </div>
                                                <div class="collapse ab" id="mycard-collapse">
                                                    <div class="element-body">
                                                        <!-- Upload  -->
                                                        <form id="file-upload-form" class="uploader">
                                                            <input id="file-upload" type="file" name="fileUpload"
                                                                accept="image/*" />

                                                            <label for="file-upload" id="file-drag">
                                                                <img id="file-image" src="#" alt="Preview"
                                                                    class="hidden">
                                                                <div id="start">
                                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                                    <div>Select
                                                                        a
                                                                        file
                                                                        or
                                                                        drag
                                                                        here
                                                                    </div>
                                                                    <div id="notimage" class="hidden">
                                                                        Please
                                                                        select
                                                                        an
                                                                        image
                                                                    </div>
                                                                    <span id="file-upload-btn"
                                                                        class="btn btn-primary">Select
                                                                        a
                                                                        file</span>
                                                                </div>
                                                                <div id="response" class="hidden">
                                                                    <div id="messages">
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </form>
                                                    </div>
                                                    <div class="element-footer">
                                                        <div class=" mb-0">
                                                            <div class="">
                                                                <a href="#" class="butn btn-primary  m-b-5 m-t-5"
                                                                    onclick="myfunction2()">Cancel
                                                                </a>
                                                                <a href="#" class="butn btn-info m-t-5 m-b-5">
                                                                    Save</a>
                                                            </div>
                                                            <div class="clearfix">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="logoupld col-12 ">
                                            <div class="add-element">
                                                <div class="element-header">
                                                    <div class="float-left">
                                                        <a data-collapse="#s-header" class="btn btn-icon"><i
                                                                class="ion ion-plus"></i>
                                                        </a>
                                                    </div>
                                                    <h4> Add
                                                        Survey
                                                        Header
                                                    </h4>
                                                </div>
                                                <div class="collapse" id="s-header">
                                                    <div class="element-body">
                                                        <!-- Upload  -->
                                                        <div class="form-group toolbox-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Add Form Heading" name="" id="form-header">
                                                            <div class="input-toolbox">
                                                                <div class="input-toolbox-inner">
                                                                    <ul>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Bold"
                                                                            data-trigger="hover">
                                                                            <span class="bold-text-control">
                                                                                <i class="fas fa-bold"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Italic"
                                                                            data-trigger="hover">
                                                                            <span class="italic-text-control">
                                                                                <i class="fas fa-italic"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Left"
                                                                            data-trigger="hover">
                                                                            <span class="left-text-control">
                                                                                <i class="fas fa-align-left"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Center"
                                                                            data-trigger="hover">
                                                                            <span class="center-text-control">
                                                                                <i class="fas fa-align-center"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Right"
                                                                            data-trigger="hover">
                                                                            <span class="right-text-control">
                                                                                <i class="fas fa-align-right"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Justify"
                                                                            data-trigger="hover">
                                                                            <span class="justify-text-control">
                                                                                <i class="fas fa-align-justify"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true"
                                                                            data-content="Text Underline"
                                                                            data-trigger="hover">
                                                                            <span class="underline-text-control">
                                                                                <i class="fas fa-underline"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Color"
                                                                            data-trigger="hover">
                                                                            <span class="underline-text-control">
                                                                                <input type="color" name="">
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="element-footer col-12">
                                                        <div class=" mb-0">
                                                            <div class="">
                                                                <a href="#" class="butn btn-primary  m-b-5 m-t-5">Cancel
                                                                </a>
                                                                <a href="#" class="butn btn-info m-t-5 m-b-5" id="add_form_header">
                                                                    Save</a>
                                                            </div>
                                                            <div class="clearfix">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body text-dark text-center form-dropzone">

                                        <div class="dropzone-inner form_builder_area">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="logoupld col-12 form-footer">
                                            <div class="add-element">
                                                <div class="element-header">
                                                    <div class="float-left">
                                                        <a data-collapse="#s-footer" class="btn btn-icon"><i
                                                                class="ion ion-plus"></i>
                                                        </a>
                                                    </div>
                                                    <h4> Add
                                                        Survey
                                                        Footer
                                                    </h4>
                                                </div>
                                                <div class="collapse" id="s-footer">
                                                    <div class="element-body">
                                                        <!-- Upload  -->
                                                        <div class="form-group toolbox-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Add Form Footer" name="" id="form-footer">
                                                            <div class="input-toolbox">
                                                                <div class="input-toolbox-inner">
                                                                    <ul>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Bold"
                                                                            data-trigger="hover">
                                                                            <span class="bold-text-control">
                                                                                <i class="fas fa-bold"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Italic"
                                                                            data-trigger="hover">
                                                                            <span class="italic-text-control">
                                                                                <i class="fas fa-italic"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Left"
                                                                            data-trigger="hover">
                                                                            <span class="left-text-control">
                                                                                <i class="fas fa-align-left"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Center"
                                                                            data-trigger="hover">
                                                                            <span class="center-text-control">
                                                                                <i class="fas fa-align-center"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Right"
                                                                            data-trigger="hover">
                                                                            <span class="right-text-control">
                                                                                <i class="fas fa-align-right"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Justify"
                                                                            data-trigger="hover">
                                                                            <span class="justify-text-control">
                                                                                <i class="fas fa-align-justify"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true"
                                                                            data-content="Text Underline"
                                                                            data-trigger="hover">
                                                                            <span class="underline-text-control">
                                                                                <i class="fas fa-underline"></i>
                                                                            </span>
                                                                        </li>
                                                                        <li data-toggle="popover" data-trigger="hover"
                                                                            data-container="body" title=""
                                                                            data-html="true" data-content="Text Color"
                                                                            data-trigger="hover">
                                                                            <span class="underline-text-control">
                                                                                <input type="color" name="">
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="element-footer">
                                                        <div class=" mb-0">
                                                            <div class="">
                                                                <a href="#"
                                                                    class="butn btn-primary  m-b-5 m-t-5">Cancel</a>
                                                                <a href="#" class="butn btn-info m-t-5 m-b-5" id="add_form_footer">
                                                                    Save</a>
                                                            </div>
                                                            <div class="clearfix">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-3">
                        <div class="col-md-12">
                            <form class="form-horizontal">
                                <div class="preview"></div>
                                <div style="display: none" class="form-group plain_html">
                                    <textarea rows="50" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>