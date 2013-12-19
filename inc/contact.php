		<?php
		//init variables
		$cf = array();
		$sr = false;
		
		if(isset($_SESSION['cf_returndata'])){
			$cf = $_SESSION['cf_returndata'];
			$sr = true;
		}
		?>
		<ul id="errors" class="<?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">
			<li id="info">There were some problems with your form submission:</li>
			<?php 
			if(isset($cf['errors']) && count($cf['errors']) > 0) :
				foreach($cf['errors'] as $error) :
			?>
			<li><?php echo $error ?></li>
			<?php
				endforeach;
			endif;
			?>
		</ul>
		<p id="success" class="<?php echo ($sr && $cf['form_ok']) ? 'visible' : ''; ?>">Thanks for your message! I'll get back to you ASAP!</p>
		<form id="contact-form" method="post" action="inc/process.php">
			<label for="name">Name: <span class="required">Required</span></label>
			<input type="text" id="name" name="name" required="required" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['name'] : '' ?>" placeholder="John Doe"  />
			
			<label for="email">Email Address: <span class="required">Required</span></label>
			<input type="email" id="email" name="email" required="required" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>" placeholder="johndoe@example.com" />
			
			
			<label for="message">Message: <span class="required">Required</span></label>
			<textarea id="message" name="message" required="required" placeholder="Your message must be greater than 20 charcters" data-minlength="20"><?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['message'] : '' ?></textarea>
			
			<span id="loading"></span>
			<input type="submit" value="Send" id="submit-button" />
		</form>
	<?php if(isset($_SESSION['cf_returndata'])) unset($_SESSION['cf_returndata']); ?>