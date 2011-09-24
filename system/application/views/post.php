<div id="pink-outer"><div id="pink-middle"><div id="pink-inner">
    <div id="message">
        <?php
            if ($post != NULL)
            {
                echo strtoupper($post['message']);
            }
            else
            {
                echo strtoupper("BAWAL ANG UNGGOY DITO");
            }
        ?>
    </div>
    <div id="warning">GOVERNMENT PROPERTY DO NOT REMOVE MERE POSSESSION OF THIS SIGN IS PUNISHABLE BY LAW</div>
</div></div></div>
<span  class='st_twitter_vcount' displayText='Tweet'></span>
<span  class='st_facebook_vcount' displayText='Facebook'></span>
<span  class='st_plusone_vcount' ></span>
<div id="your-own"><a href="http://mmda.labs.randell.ph/">Create your own sign</a></div>
<div id="sign-url">URL: <input type="text" value="http://mmda.labs.randell.ph/sign/<?php echo $post != NULL ? $post['post_id_hex'] : ''; ?>" /></div>