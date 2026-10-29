<?php
$fields = [
	'name' => '',
	'email' => '',
	'phone' => '',
	'subject' => '',
	'message' => '',
];
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	foreach ($fields as $key => $value) {
		$fields[$key] = trim((string) ($_POST[$key] ?? ''));
	}

	if ($fields['name'] === '') $errors[] = 'Name is required.';
	if (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Enter a valid email address.';
	if ($fields['subject'] === '') $errors[] = 'Subject is required.';
	if ($fields['message'] === '') $errors[] = 'Message is required.';
	$success = count($errors) === 0;
}

function h(string $value): string
{
	return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Form</title>
	<style>
		body { max-width: 600px; margin: 40px auto; padding: 0 16px; font: 16px Arial, sans-serif; }
		.field { margin: 16px 0; }
		label { display: block; margin-bottom: 6px; }
		input, textarea { width: 100%; padding: 8px; }
		textarea { min-height: 100px; }
		button { padding: 10px 16px; }
		.notice { padding: 10px; margin: 16px 0; }
		.success { color: green; }
		.errors { color: darkred; }
	</style>
</head>
<body>
<main>
	<h1>Contact us</h1>
	<p class="intro">Send us a message using the form below.</p>

	<?php if ($success): ?>
		<div class="notice success" role="status">Thanks, <?= h($fields['name']) ?>. Your message was received.</div>
	<?php elseif ($errors): ?>
		<div class="notice errors" role="alert">
			<strong>Please check the following:</strong>
			<ul><?php foreach ($errors as $error): ?><li><?= h($error) ?></li><?php endforeach; ?></ul>
		</div>
	<?php endif; ?>

	<form method="post" action="">
		<div class="field">
			<label for="name">Name *</label>
			<input id="name" name="name" type="text" autocomplete="name" required value="<?= h($fields['name']) ?>">
		</div>
		<div class="field">
			<label for="email">Email *</label>
			<input id="email" name="email" type="email" autocomplete="email" required value="<?= h($fields['email']) ?>">
		</div>
		<div class="field">
			<label for="phone">Phone</label>
			<input id="phone" name="phone" type="tel" autocomplete="tel" value="<?= h($fields['phone']) ?>">
		</div>
		<div class="field">
			<label for="subject">Subject *</label>
			<input id="subject" name="subject" type="text" required value="<?= h($fields['subject']) ?>">
		</div>
		<div class="field">
			<label for="message">Message *</label>
			<textarea id="message" name="message" required><?= h($fields['message']) ?></textarea>
		</div>
		<button type="submit">Send message</button>
	</form>
</main>
</body>
</html>
