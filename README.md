Kohana Flash
============

My take on a simple flash helper. Basic usage is:

```php
<?php
Flash::success('Your success message');
```

Then in your view:

```php
<?php echo Flash::render(); ?>
```

Or if you're using a Smarty view:

```smarty
{flash}
```