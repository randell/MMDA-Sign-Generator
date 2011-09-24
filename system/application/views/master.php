<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="Randell Benavidez" />
<meta name="description" content="MMDA Sign Post Generator" />
<meta name="keywords" content="MMDA, Sign, Post, Generator" />
<title>MMDA Sign Post Generator</title>
<style media="all" type="text/css">
    @import "<?php echo site_url('styles/style.css') ?>";
    @import "<?php echo site_url('styles/niftyCorners.css') ?>";
</style>
<script type="text/javascript" src="<?php echo site_url('scripts/jquery-1.3.2.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('scripts/jquery.form.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('scripts/niftycube.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('scripts/niftymmda.js') ?>"></script>
<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher:'2446bbb9-5773-422f-b007-fccc5ebeea3b'});</script>
</head>
<body>
<?php echo $this->load->view('header', '', TRUE); ?>
<?php echo $content; ?>
<?php echo $this->load->view('footer', '', TRUE); ?>
<?php echo $this->load->view('analytics', '', TRUE); ?>
</body>
</html>