# Developer Exam
## Initial deployment
1. run **`composer install`**
2. Copy and rename the **.env.production** file to **.env** and modify the relevant settings
3. run **`php artisan migrate`** cp .env.example .env
4. **APP_ENV** must remain production in **.env** file and **APP_URL** must match the domain
5. setup scheduled task. run **`php artisan  schedule:work`** every **minute**
6. setup **Queue Worker** service, run **`php artisan  queue:work`**
7. setup **Websockets** service, run **`artisan websockets:serve --debug`**

## Environment differences
- For **Development** or **Test**, set **APP_ENV=loca**l in **.env** file
- For **Production**, set **APP_ENV=production** and **APP_DEBUG=false** in **.env** file

## Account
Default Administrator

```sh
Username = admin
Email = devexadmin@gmail.com
Password = ab123456
```

## Developers

 1. [Edmund Orario Mati Jr.](https://github.com/ejvaux)
