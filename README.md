# BeaucalInvalidSession

Use when you're using `Zend\Session\SessionManager` and have validators.  When validators fail, instead of the user being blocked by seemingly permanent exceptions, the session is simply cleared and it's business as usual.

*Note:* You could add this simple code to your Application module, but you lose this feature if the session is hit in an earlier bootstrap.

*Note 2:* The HttpUserAgent session validator will fail every time your user's browser updates itself!  So use this module and avoid stymied users.

### Installation
In application.config.php, install early, as follows:

```php
'modules' => ['BeaucalInvalidSession', 'Other Modules...']
```
