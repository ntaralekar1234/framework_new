
<!-- begin::Body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <style type="text/css">
    *{padding: 0px;margin: 0px;}
    .error-wrapper{
    background-size: 80% auto;
    background-repeat: no-repeat;
    background-position: left center;
    width: 100%;
    height: 99vh;
    position: relative;
    display: inline-block;
    }
    .error-inner {
    width: 50%;
    max-width: 600px;
    background-color: #fff4f4;
    border: dashed 2px #fbd3d3;
    color: #f00;
    position: absolute;
    right: 100px;
    padding: 30px;
    top: 50%;
    transform: translateY(-50%);
    border-radius: 7px;
    box-shadow: 0px 3px 15px rgba(0,0,0,0.1);
    font-size: 18px; 
}
    </style>
    
    <div class="error-wrapper" style="background-image: url(<?php echo base_url('assets/images/error-bg.png');?>);">
        <div class="error-inner">
            <?php echo $response['message']; ?> 
        </div>
    </div>


   </body>
<!-- end::Body -->