<link rel="stylesheet" href="https://cdn.jsdelivr.net/font-hack/2.018/css/hack.min.css" />
<style class="cp-pen-styles">*,
*:before,
*:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  color: #000;
}

html {
  font-size: 70%;
}

body {
  background-color: #000;
  font-family: 'Hack', monospace;
}
a:hover,a:focus{outline: none;}
a {
  text-decoration: none;
  cursor: pointer;
  color: #333;
}
a:hover {
  text-decoration: underline;
}
.wrapper{
   background-image: url(pexels-photo-593101.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 100vh;
}
.overlay{background-color: rgba(255,255,255,0.90);position: absolute;width: 100%;height: 100vh}
.text__error,
.text__link {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  text-align: center;
}

.text__error {
  margin-top: -35px;
  height: 30px;
  line-height: 30px;
  font-size: 2rem;
}

.text__link {
  margin-top: 5px;
  height: 20px;
  line-height: 20px;
  font-size: 1.4rem;
}
</style>
<div class="wrapper">
	<div class="overlay"></div>	
	<div class="text__error" data-text="Permission Denied"></div>
	<div class="text__link"><a data-text="click here to go home" href="<?php echo base_url('dashboard');?>"></a></div>
</div>