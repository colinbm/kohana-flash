<?php foreach ($flashes as $flash): ?>
<div class="alert-message <?php echo $flash['type']; ?>" data-alert>
	<p><?php echo $flash['message']; ?></p>
</div>
<?php endforeach; ?>
