<div id="thePost">
	<h3 class="title">
		<?php echo $Post->P_title; ?>
	</h3>
	<img src="<?php echo $Post->P_url; ?>">
	<span><?php echo $Post->P_upp;?> points</span>
	<?php 
	if ($Post->V_value == 0) {
		?>
		<button class="ui button up">↑</button>
		<button class="ui button down">↓</button>
		<?php
	}
	else if ($Post->V_value == 1) {
		?>
		<button class="ui button up checked">↑</button>
		<button class="ui button down">↓</button>
		<?php
	}
	else if ($Post->V_value == -1) {
		?>
		<button class="ui button up">↑</button>
		<button class="ui button down checked">↓</button>
		<?php
	}
	?>
</div>
<div id="comments"></div>