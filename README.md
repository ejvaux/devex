# Developer Exam
## Initial deployment
1. run **`composer install`**
2. Copy and rename the **.env.production** file to **.env** and modify the relevant settings
3. run **`php artisan migrate`** and **`php artisan db:seed`**
4. **APP_ENV** must remain production in **.env** file and **APP_URL** must match the domain
5. run **`php artisan storage:link`**

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

## Developer

 1. [Edmund Orario Mati Jr.](https://github.com/ejvaux)
