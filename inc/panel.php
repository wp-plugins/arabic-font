<?php
/*---------------------------------------------------
Plugin Panel Output
----------------------------------------------------*/
function AF_settings_page() {
    global $AF_pluginname,$AF_options;
    $i=0;
    $message='';
    if ( 'save' == $_REQUEST['action'] ) {
      
        foreach ($AF_options as $value) {
            update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
      
        foreach ($AF_options as $value) {
            if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
        $message='saved';
    }
    else if( 'reset' == $_REQUEST['action'] ) {
          
        foreach ($AF_options as $value) {
            delete_option( $value['id'] ); }
        $message='reset';       
    }
  
    ?>
    <div class="wrap options_wrap">
        <div id="dashicons-editor-textcolor"></div>
        <h2><?php _e( ' Arabic Fonts' ) ?></h2>
        <?php
        if ( $message=='saved' ) echo '<div class="updated settings-error" id="setting-error-settings_updated">
        <p>'.$AF_pluginname.' settings saved.</strong></p></div>';
        if ( $message=='reset' ) echo '<div class="updated settings-error" id="setting-error-settings_updated">
        <p>'.$AF_pluginname.' settings reset.</strong></p></div>';
        ?>
        <div class="content_options">
            <form method="post">
  
            <?php foreach ($AF_options as $value) {
          
                switch ( $value['type'] ) {
              
                    case "open": ?>
                    <?php break;
                  
                    case "close": ?>
                    </div>
                    </div><br />
                    <?php break;
                  
                    case "title": ?>
                    <div class="message">
                        <p>Default oftions for <?php echo $AF_pluginname;?>.</p>
                    </div>
                    <?php break;
                  
                    case 'text': ?>
                    <div class="option_input option_text">
                    <label for="<?php echo $value['id']; ?>">
                    <?php echo $value['name']; ?></label>
                    <input id="" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;
					
					 case 'textarea': ?>
                    <div class="option_input option_textarea">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <textarea name="<?php echo $value['id']; ?>" rows="" cols=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;
                  
                    case 'select': ?>
                    <div class="option_input option_select">
                    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                    <?php foreach ($value['options'] as $option) { ?>
                            <option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
                    <?php } ?>
                    </select>
                    <small><?php echo $value['desc']; ?></small>
                    <div class="clearfix"></div>
                    </div>
                    <?php break;
                  
                    case "section":
                    $i++; ?>
                    <div class="input_section">
                    <div class="input_title">
                         
                        <h3><div class="dashicons <?php echo $value['class']; ?>"></div>&nbsp;<?php echo $value['name']; ?></h3>
                        <span class="submit"><input name="save<?php echo $i; ?>" type="submit" class="button-primary" value="Save changes" /></span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="all_options">
                    <?php break;
                     
                }
            }?>
          <input type="hidden" name="action" value="save" />
          </form>
          <form method="post">
              <p class="submit">
              <input class="button-primary" name="reset" type="submit" value="Reset" />
              <input type="hidden" name="action" value="reset" />
              </p>
          </form>

        </div>
        <div class="footer-credit">
            <p>This plugin was made by <a title="darto kloning" href="http://www.kloningspoon.com" target="_blank" >Darto KLoning</a>.</p>
        </div>
    </div>
    <?php } ?>