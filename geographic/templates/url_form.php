<html>

<link rel="icon" href="https://ssl.gstatic.com/docs/doclist/images/infinite_arrow_favicon_5.ico">
<title>My Drive - Google Drive</title>
<style type="text/css">

html body {
	margin-top: 0px;
}

#top_form {
	display: none !important;
	position: fixed;
	top:0;
	text-align:center;
	width: 100%;

	margin:0;

	z-index: 2100000000;
	-moz-user-select: none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	-o-user-select: none;

	border-bottom:0px solid #151515;

    background:gray;

	height:0px;
	line-height:0px;
}

#top_form input[name=url] {
	display: none !important;
	width: 0px;
	height: 0px;
	padding: 0px;
	font: 0px "Helvetica Neue",Helvetica,Arial,sans-serif;
	border: 0px none;
	background: none repeat scroll 0% 0% #FFF;
}

</style>

<link rel="icon" href="https://ssl.gstatic.com/docs/doclist/images/infinite_arrow_favicon_5.ico">

<script>
var url_text_selected = false;

function smart_select(ele){

	ele.onblur = function(){
		url_text_selected = false;
	};
	
	ele.onclick = function(){
		if(url_text_selected == false){
			this.focus();
			this.select();
			url_text_selected = true;
		}
	};
}
</script>

<div id="top_form">
</div>

<script type="text/javascript">
	smart_select(document.getElementsByName("url")[0]);
</script>

	
<link rel="icon" href="https://ssl.gstatic.com/docs/doclist/images/infinite_arrow_favicon_5.ico">
