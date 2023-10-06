# Posts


## List posts




> Example request:

```bash
curl -X GET \
    -G "https://laraclassified.bedigit.local/api/posts?embed=fuga" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/posts"
);

let params = {
    "embed": "fuga",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://laraclassified.bedigit.local/api/posts',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'fuga',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "message": null,
    "result": {
        "data": [
            {
                "id": 6904,
                "country_code": "US",
                "user_id": null,
                "category_id": "101",
                "post_type_id": "2",
                "title": "S'inscrire - {app_name}",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": null,
                "negotiable": null,
                "contact_name": "Man Shark",
                "email": "oop@test.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "48342",
                "lat": "37.34",
                "lon": "-121.89",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "78dba3204bc578190495c621c695bba0",
                "email_token": "c8e25781891bd17548f569f5097448c9",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-07T06:20:31.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-07T06:19:24.000000Z",
                "updated_at": "2021-06-07T06:20:31.000000Z",
                "slug": "sinscrire-app_name",
                "created_at_formatted": "Jun 7th, 2021 at 02:19",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6903,
                "country_code": "US",
                "user_id": null,
                "category_id": "106",
                "post_type_id": "1",
                "title": "Toyota RAV 4 cool",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "2333.00",
                "negotiable": null,
                "contact_name": "Edou",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "49142",
                "lat": "47.61",
                "lon": "-122.33",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "d0213015bede441a8493af8b4e47d6f7",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-06T09:50:12.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-06T09:48:43.000000Z",
                "updated_at": "2021-06-06T09:50:12.000000Z",
                "slug": "toyota-rav-4-cool",
                "created_at_formatted": "Jun 6th, 2021 at 05:48",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6902,
                "country_code": "US",
                "user_id": null,
                "category_id": "107",
                "post_type_id": "2",
                "title": "Do you have something to sell",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "2343.00",
                "negotiable": null,
                "contact_name": "Edou",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "42634",
                "lat": "30.51",
                "lon": "-87.21",
                "ip_addr": "::1",
                "visits": "7",
                "tmp_token": "b138af1002d155785f3c1af412e87a8b",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-12T13:49:08.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-06T08:56:29.000000Z",
                "updated_at": "2021-06-12T13:49:08.000000Z",
                "slug": "do-you-have-something-to-sell",
                "created_at_formatted": "Jun 6th, 2021 at 04:56",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6901,
                "country_code": "US",
                "user_id": null,
                "category_id": "107",
                "post_type_id": "1",
                "title": "Toyota RAV 4 cool",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "2333.00",
                "negotiable": null,
                "contact_name": "Edou",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "48507",
                "lat": "39.74",
                "lon": "-104.98",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "f6edd37c384209a15d5e67ed99deb8f8",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-06T07:01:45.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-06T07:01:05.000000Z",
                "updated_at": "2021-06-06T07:01:45.000000Z",
                "slug": "toyota-rav-4-cool",
                "created_at_formatted": "Jun 6th, 2021 at 03:01",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6900,
                "country_code": "US",
                "user_id": null,
                "category_id": "106",
                "post_type_id": "1",
                "title": "Publier une annonce",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use<\/span><\/p>",
                "tags": "",
                "price": null,
                "negotiable": null,
                "contact_name": "Edou",
                "email": "abc@toto.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "48507",
                "lat": "39.74",
                "lon": "-104.98",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "6cef5eb4a9a2bfd0816d2987b5c7e035",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-06T06:59:49.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-05T04:19:45.000000Z",
                "updated_at": "2021-06-06T06:59:49.000000Z",
                "slug": "publier-une-annonce",
                "created_at_formatted": "Jun 5th, 2021 at 00:19",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6899,
                "country_code": "US",
                "user_id": null,
                "category_id": "101",
                "post_type_id": "1",
                "title": "Do you have something to sell",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "11000.00",
                "negotiable": null,
                "contact_name": "User Tata",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "46947",
                "lat": "40.71",
                "lon": "-74.01",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "2e56c5d74643af1d8f67c1134afc1f5d",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-06-05T03:15:00.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-06-05T03:11:40.000000Z",
                "updated_at": "2021-06-05T03:15:00.000000Z",
                "slug": "do-you-have-something-to-sell",
                "created_at_formatted": "Jun 4th, 2021 at 23:11",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6898,
                "country_code": "US",
                "user_id": null,
                "category_id": "108",
                "post_type_id": "1",
                "title": "A to to ga ga",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "129.00",
                "negotiable": null,
                "contact_name": "Moïse",
                "email": "toto@test.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "48342",
                "lat": "37.34",
                "lon": "-121.89",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "9ea2129edbf22842c6fb8eba33367895",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-05-28T12:45:01.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-05-28T12:44:27.000000Z",
                "updated_at": "2021-05-28T12:45:01.000000Z",
                "slug": "a-to-to-ga-ga",
                "created_at_formatted": "May 28th, 2021 at 08:44",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6897,
                "country_code": "US",
                "user_id": null,
                "category_id": "101",
                "post_type_id": "1",
                "title": "Publier une annonce",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "3000.00",
                "negotiable": null,
                "contact_name": "Edou",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "44675",
                "lat": "33.21",
                "lon": "-97.13",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "454cd3e9051b175e206f929f4bdb1034",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-05-28T12:42:06.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-05-28T12:41:24.000000Z",
                "updated_at": "2021-05-28T12:42:06.000000Z",
                "slug": "publier-une-annonce",
                "created_at_formatted": "May 28th, 2021 at 08:41",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6896,
                "country_code": "US",
                "user_id": null,
                "category_id": "109",
                "post_type_id": "1",
                "title": "Do you have something to sell",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "2333.00",
                "negotiable": null,
                "contact_name": "Edou",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "43765",
                "lat": "38.74",
                "lon": "-90.31",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "6bc0a364c39da4a8dbcbfb6e52fc6715",
                "email_token": null,
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-05-28T12:39:50.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-05-28T12:39:45.000000Z",
                "updated_at": "2021-05-28T12:39:50.000000Z",
                "slug": "do-you-have-something-to-sell",
                "created_at_formatted": "May 28th, 2021 at 08:39",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6895,
                "country_code": "US",
                "user_id": null,
                "category_id": "107",
                "post_type_id": "1",
                "title": "Publier une annonce",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "11000.00",
                "negotiable": null,
                "contact_name": "Edou",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "44873",
                "lat": "29.42",
                "lon": "-98.49",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "883b2871d2076ed58ded00af854b9fca",
                "email_token": "3d9e1a87cabb28e36ec14c413410429b",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "1",
                "featured": "1",
                "archived": "0",
                "archived_at": "2021-05-28T12:22:46.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-05-28T12:21:52.000000Z",
                "updated_at": "2021-05-28T12:22:46.000000Z",
                "slug": "publier-une-annonce",
                "created_at_formatted": "May 28th, 2021 at 08:21",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6894,
                "country_code": "US",
                "user_id": null,
                "category_id": "101",
                "post_type_id": "1",
                "title": "Amissa ko ton hoho",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "3000.00",
                "negotiable": null,
                "contact_name": "Edou",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "48335",
                "lat": "32.72",
                "lon": "-117.16",
                "ip_addr": "::1",
                "visits": "3",
                "tmp_token": "6cc9154a4bcaba3eee4bf6f0bd706a5a",
                "email_token": "f393a6db8eeef509d6aa31d6d0c204e0",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-05-28T12:00:36.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-05-28T09:43:28.000000Z",
                "updated_at": "2021-05-28T12:00:36.000000Z",
                "slug": "amissa-ko-ton-hoho",
                "created_at_formatted": "May 28th, 2021 at 05:43",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            },
            {
                "id": 6889,
                "country_code": "US",
                "user_id": null,
                "category_id": "107",
                "post_type_id": "1",
                "title": "Toyota RAV 4 cool",
                "description": "<p><span style=\"color:#292b2c;font-family:Roboto, Helvetica, Arial, sans-serif;font-size:13px;text-align:center;background-color:#ffffff;\">Do you have something to sell, to rent, any service to offer or a job offer? Post it at LaraClassified, its free, for local business and very easy to use!<\/span><\/p>",
                "tags": "",
                "price": "7.50",
                "negotiable": null,
                "contact_name": "User Test",
                "email": "ddd@tata.com",
                "phone": "",
                "phone_hidden": null,
                "address": null,
                "city_id": "48335",
                "lat": "32.72",
                "lon": "-117.16",
                "ip_addr": "::1",
                "visits": "1",
                "tmp_token": "daa753c20d896721bad8e196170a4c70",
                "email_token": "b24ef0c3bdd2861af56b058b53e794e1",
                "phone_token": null,
                "verified_email": "1",
                "verified_phone": "1",
                "accept_terms": "1",
                "accept_marketing_offers": "0",
                "is_permanent": "0",
                "reviewed": "0",
                "featured": "0",
                "archived": "0",
                "archived_at": "2021-05-28T09:30:10.000000Z",
                "deletion_mail_sent_at": null,
                "fb_profile": null,
                "partner": null,
                "created_at": "2021-05-28T08:50:21.000000Z",
                "updated_at": "2021-05-28T09:30:10.000000Z",
                "slug": "toyota-rav-4-cool",
                "created_at_formatted": "May 28th, 2021 at 04:50",
                "user_photo_url": "http:\/\/laraclassified.bedigit.local\/images\/user.jpg"
            }
        ]
    },
    "extra": {
        "count": null,
        "preSearch": [],
        "fields": []
    }
}
```
<div id="execution-results-GETapi-posts" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts"></code></pre>
</div>
<div id="execution-error-GETapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts"></code></pre>
</div>
<form id="form-GETapi-posts" data-method="GET" data-path="api/posts" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts" onclick="tryItOut('GETapi-posts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts" onclick="cancelTryOut('GETapi-posts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-posts" data-component="query"  hidden>
<br>
Comma-separated list of the post relationships for Eager Loading. Possible values: user,category,postType,city,latestPayment,savedByLoggedUser,pictures
</p>
</form>


## Get post




> Example request:

```bash
curl -X GET \
    -G "https://laraclassified.bedigit.local/api/posts/quis?embed=ea&detailed=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/posts/quis"
);

let params = {
    "embed": "ea",
    "detailed": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://laraclassified.bedigit.local/api/posts/quis',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'ea',
            'detailed'=> '',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-GETapi-posts--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id-"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id-"></code></pre>
</div>
<form id="form-GETapi-posts--id-" data-method="GET" data-path="api/posts/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts--id-" onclick="tryItOut('GETapi-posts--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts--id-" onclick="cancelTryOut('GETapi-posts--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-posts--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-posts--id-" data-component="query"  hidden>
<br>
Comma-separated list of the post relationships for Eager Loading. Possible values: user,category,postType,city,latestPayment,savedByLoggedUser,pictures
</p>
<p>
<b><code>detailed</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="GETapi-posts--id-" hidden><input type="radio" name="detailed" value="1" data-endpoint="GETapi-posts--id-" data-component="query" ><code>true</code></label>
<label data-endpoint="GETapi-posts--id-" hidden><input type="radio" name="detailed" value="0" data-endpoint="GETapi-posts--id-" data-component="query" ><code>false</code></label>
<br>
Allow to get the post's details with all its relationships (No need to set the 'embed' parameter).
</p>
</form>


## Store post

<small class="badge badge-darkred">requires authentication</small>

For both types of post's creation (Single step or Multi steps).
Note: The field 'admin_code' is only available when the post's country's 'admin_type' column is set to 1 or 2 and the 'admin_field_active' column is set to 1.

> Example request:

```bash
curl -X POST \
    "https://laraclassified.bedigit.local/api/posts" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -F "category_id=1" \
    -F "post_type_id=1" \
    -F "title=John Doe" \
    -F "description=Beatae placeat atque tempore consequatur animi magni omnis." \
    -F "contact_name=John Doe" \
    -F "email=john.doe@domain.tld" \
    -F "phone=+17656766467" \
    -F "city_id=5" \
    -F "accept_terms=" \
    -F "country_code=US" \
    -F "admin_code=0" \
    -F "price=5000" \
    -F "negotiable=" \
    -F "phone_hidden=" \
    -F "ip_addr=assumenda" \
    -F "accept_marketing_offers=1" \
    -F "is_permanent=1" \
    -F "tags=car,automotive,tesla,cyber,truck" \
    -F "package_id=2" \
    -F "payment_method_id=5" \
    -F "captcha_key=quod" \
    -F "pictures[]=@/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpHzOLPB" 
```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/posts"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};

const body = new FormData();
body.append('category_id', '1');
body.append('post_type_id', '1');
body.append('title', 'John Doe');
body.append('description', 'Beatae placeat atque tempore consequatur animi magni omnis.');
body.append('contact_name', 'John Doe');
body.append('email', 'john.doe@domain.tld');
body.append('phone', '+17656766467');
body.append('city_id', '5');
body.append('accept_terms', '');
body.append('country_code', 'US');
body.append('admin_code', '0');
body.append('price', '5000');
body.append('negotiable', '');
body.append('phone_hidden', '');
body.append('ip_addr', 'assumenda');
body.append('accept_marketing_offers', '1');
body.append('is_permanent', '1');
body.append('tags', 'car,automotive,tesla,cyber,truck');
body.append('package_id', '2');
body.append('payment_method_id', '5');
body.append('captcha_key', 'quod');
body.append('pictures[]', document.querySelector('input[name="pictures[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://laraclassified.bedigit.local/api/posts',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'multipart' => [
            [
                'name' => 'category_id',
                'contents' => '1'
            ],
            [
                'name' => 'post_type_id',
                'contents' => '1'
            ],
            [
                'name' => 'title',
                'contents' => 'John Doe'
            ],
            [
                'name' => 'description',
                'contents' => 'Beatae placeat atque tempore consequatur animi magni omnis.'
            ],
            [
                'name' => 'contact_name',
                'contents' => 'John Doe'
            ],
            [
                'name' => 'email',
                'contents' => 'john.doe@domain.tld'
            ],
            [
                'name' => 'phone',
                'contents' => '+17656766467'
            ],
            [
                'name' => 'city_id',
                'contents' => '5'
            ],
            [
                'name' => 'accept_terms',
                'contents' => ''
            ],
            [
                'name' => 'country_code',
                'contents' => 'US'
            ],
            [
                'name' => 'admin_code',
                'contents' => '0'
            ],
            [
                'name' => 'price',
                'contents' => '5000'
            ],
            [
                'name' => 'negotiable',
                'contents' => ''
            ],
            [
                'name' => 'phone_hidden',
                'contents' => ''
            ],
            [
                'name' => 'ip_addr',
                'contents' => 'assumenda'
            ],
            [
                'name' => 'accept_marketing_offers',
                'contents' => '1'
            ],
            [
                'name' => 'is_permanent',
                'contents' => '1'
            ],
            [
                'name' => 'tags',
                'contents' => 'car,automotive,tesla,cyber,truck'
            ],
            [
                'name' => 'package_id',
                'contents' => '2'
            ],
            [
                'name' => 'payment_method_id',
                'contents' => '5'
            ],
            [
                'name' => 'captcha_key',
                'contents' => 'quod'
            ],
            [
                'name' => 'pictures[]',
                'contents' => fopen('/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpHzOLPB', 'r')
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (422):

```json
{
    "success": false,
    "message": "An error occurred while validating the data.",
    "errors": {
        "accept_terms": [
            "The terms must be accepted."
        ]
    }
}
```
<div id="execution-results-POSTapi-posts" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-posts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-posts"></code></pre>
</div>
<div id="execution-error-POSTapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-posts"></code></pre>
</div>
<form id="form-POSTapi-posts" data-method="POST" data-path="api/posts" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"multipart\/form-data","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-posts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-posts" onclick="tryItOut('POSTapi-posts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-posts" onclick="cancelTryOut('POSTapi-posts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-posts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/posts</code></b>
</p>
<p>
<label id="auth-POSTapi-posts" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-posts" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>category_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="category_id" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The category's ID.
</p>
<p>
<b><code>post_type_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="post_type_id" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post type's ID.
</p>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The post's title.
</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The post's description.
</p>
<p>
<b><code>contact_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="contact_name" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The post's author name.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post's author email address (required if mobile phone number doesn't exist).
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post's author mobile number (required if email doesn't exist).
</p>
<p>
<b><code>city_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="city_id" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The city's ID.
</p>
<p>
<b><code>accept_terms</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_terms" value="true" data-endpoint="POSTapi-posts" data-component="body" required ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_terms" value="false" data-endpoint="POSTapi-posts" data-component="body" required ><code>false</code></label>
<br>
Accept the website terms and conditions.
</p>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>admin_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="admin_code" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The administrative division's code.
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="price" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The price.
</p>
<p>
<b><code>negotiable</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="negotiable" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="negotiable" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Negotiable price or no.
</p>
<p>
<b><code>phone_hidden</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="phone_hidden" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="phone_hidden" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Mobile phone number will be hidden in public or no.
</p>
<p>
<b><code>ip_addr</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ip_addr" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The post's author IP address.
</p>
<p>
<b><code>accept_marketing_offers</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_marketing_offers" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="accept_marketing_offers" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Accept to receive marketing offers or no.
</p>
<p>
<b><code>is_permanent</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="is_permanent" value="true" data-endpoint="POSTapi-posts" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-posts" hidden><input type="radio" name="is_permanent" value="false" data-endpoint="POSTapi-posts" data-component="body" ><code>false</code></label>
<br>
Is it permanent post or no.
</p>
<p>
<b><code>tags</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tags" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
Comma-separated tags list.
</p>
<p>
<b><code>pictures</code></b>&nbsp;&nbsp;<small>file[]</small>  &nbsp;
<input type="file" name="pictures.0" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<input type="file" name="pictures.1" data-endpoint="POSTapi-posts" data-component="body" hidden>
<br>
The post's pictures.
</p>
<p>
<b><code>package_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="package_id" data-endpoint="POSTapi-posts" data-component="body" required  hidden>
<br>
The package's ID.
</p>
<p>
<b><code>payment_method_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="payment_method_id" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
The payment method's ID (required when the selected package's price is > 0).
</p>
<p>
<b><code>captcha_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="captcha_key" data-endpoint="POSTapi-posts" data-component="body"  hidden>
<br>
Key generated by the CAPTCHA endpoint calling (Required if the CAPTCHA verification is enabled from the Admin panel).
</p>

</form>


## Update post

<small class="badge badge-darkred">requires authentication</small>

Note: The fields 'pictures', 'package_id' and 'payment_method_id' are only available with the single step post edition.
The field 'admin_code' is only available when the post's country's 'admin_type' column is set to 1 or 2 and the 'admin_field_active' column is set to 1.

> Example request:

```bash
curl -X PUT \
    "https://laraclassified.bedigit.local/api/posts/ducimus" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -F "category_id=1" \
    -F "post_type_id=1" \
    -F "title=John Doe" \
    -F "description=Beatae placeat atque tempore consequatur animi magni omnis." \
    -F "contact_name=John Doe" \
    -F "email=john.doe@domain.tld" \
    -F "phone=+17656766467" \
    -F "city_id=18" \
    -F "accept_terms=" \
    -F "country_code=US" \
    -F "admin_code=0" \
    -F "price=5000" \
    -F "negotiable=" \
    -F "phone_hidden=" \
    -F "ip_addr=voluptatum" \
    -F "accept_marketing_offers=" \
    -F "is_permanent=1" \
    -F "tags=car,automotive,tesla,cyber,truck" \
    -F "package_id=2" \
    -F "payment_method_id=5" \
    -F "pictures[]=@/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpsWI7ic" 
```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/posts/ducimus"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};

const body = new FormData();
body.append('category_id', '1');
body.append('post_type_id', '1');
body.append('title', 'John Doe');
body.append('description', 'Beatae placeat atque tempore consequatur animi magni omnis.');
body.append('contact_name', 'John Doe');
body.append('email', 'john.doe@domain.tld');
body.append('phone', '+17656766467');
body.append('city_id', '18');
body.append('accept_terms', '');
body.append('country_code', 'US');
body.append('admin_code', '0');
body.append('price', '5000');
body.append('negotiable', '');
body.append('phone_hidden', '');
body.append('ip_addr', 'voluptatum');
body.append('accept_marketing_offers', '');
body.append('is_permanent', '1');
body.append('tags', 'car,automotive,tesla,cyber,truck');
body.append('package_id', '2');
body.append('payment_method_id', '5');
body.append('pictures[]', document.querySelector('input[name="pictures[]"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'https://laraclassified.bedigit.local/api/posts/ducimus',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'multipart' => [
            [
                'name' => 'category_id',
                'contents' => '1'
            ],
            [
                'name' => 'post_type_id',
                'contents' => '1'
            ],
            [
                'name' => 'title',
                'contents' => 'John Doe'
            ],
            [
                'name' => 'description',
                'contents' => 'Beatae placeat atque tempore consequatur animi magni omnis.'
            ],
            [
                'name' => 'contact_name',
                'contents' => 'John Doe'
            ],
            [
                'name' => 'email',
                'contents' => 'john.doe@domain.tld'
            ],
            [
                'name' => 'phone',
                'contents' => '+17656766467'
            ],
            [
                'name' => 'city_id',
                'contents' => '18'
            ],
            [
                'name' => 'accept_terms',
                'contents' => ''
            ],
            [
                'name' => 'country_code',
                'contents' => 'US'
            ],
            [
                'name' => 'admin_code',
                'contents' => '0'
            ],
            [
                'name' => 'price',
                'contents' => '5000'
            ],
            [
                'name' => 'negotiable',
                'contents' => ''
            ],
            [
                'name' => 'phone_hidden',
                'contents' => ''
            ],
            [
                'name' => 'ip_addr',
                'contents' => 'voluptatum'
            ],
            [
                'name' => 'accept_marketing_offers',
                'contents' => ''
            ],
            [
                'name' => 'is_permanent',
                'contents' => '1'
            ],
            [
                'name' => 'tags',
                'contents' => 'car,automotive,tesla,cyber,truck'
            ],
            [
                'name' => 'package_id',
                'contents' => '2'
            ],
            [
                'name' => 'payment_method_id',
                'contents' => '5'
            ],
            [
                'name' => 'pictures[]',
                'contents' => fopen('/private/var/folders/r0/k0xbnx757k3fnz09_6g9rp6w0000gn/T/phpsWI7ic', 'r')
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-PUTapi-posts--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-posts--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-posts--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-posts--id-"></code></pre>
</div>
<form id="form-PUTapi-posts--id-" data-method="PUT" data-path="api/posts/{id}" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"multipart\/form-data","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-posts--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-posts--id-" onclick="tryItOut('PUTapi-posts--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-posts--id-" onclick="cancelTryOut('PUTapi-posts--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-posts--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/posts/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-posts--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-posts--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-posts--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>category_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="category_id" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The category's ID.
</p>
<p>
<b><code>post_type_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="post_type_id" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post type's ID.
</p>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The post's title.
</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The post's description.
</p>
<p>
<b><code>contact_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="contact_name" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The post's author name.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post's author email address (required if mobile phone number doesn't exist).
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post's author mobile number (required if email doesn't exist).
</p>
<p>
<b><code>city_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="city_id" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The city's ID.
</p>
<p>
<b><code>accept_terms</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_terms" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" required ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_terms" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" required ><code>false</code></label>
<br>
Accept the website terms and conditions.
</p>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>admin_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="admin_code" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The administrative division's code.
</p>
<p>
<b><code>price</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="price" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The price.
</p>
<p>
<b><code>negotiable</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="negotiable" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="negotiable" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Negotiable price or no.
</p>
<p>
<b><code>phone_hidden</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="phone_hidden" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="phone_hidden" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Mobile phone number will be hidden in public or no.
</p>
<p>
<b><code>ip_addr</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ip_addr" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The post's author IP address.
</p>
<p>
<b><code>accept_marketing_offers</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_marketing_offers" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="accept_marketing_offers" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Accept to receive marketing offers or no.
</p>
<p>
<b><code>is_permanent</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="is_permanent" value="true" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-posts--id-" hidden><input type="radio" name="is_permanent" value="false" data-endpoint="PUTapi-posts--id-" data-component="body" ><code>false</code></label>
<br>
Is it permanent post or no.
</p>
<p>
<b><code>tags</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tags" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
Comma-separated tags list.
</p>
<p>
<b><code>pictures</code></b>&nbsp;&nbsp;<small>file[]</small>  &nbsp;
<input type="file" name="pictures.0" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<input type="file" name="pictures.1" data-endpoint="PUTapi-posts--id-" data-component="body" hidden>
<br>
The post's pictures.
</p>
<p>
<b><code>package_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="package_id" data-endpoint="PUTapi-posts--id-" data-component="body" required  hidden>
<br>
The package's ID.
</p>
<p>
<b><code>payment_method_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="payment_method_id" data-endpoint="PUTapi-posts--id-" data-component="body"  hidden>
<br>
The payment method's ID (required when the selected package's price is > 0).
</p>

</form>


## Delete post(s)

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "https://laraclassified.bedigit.local/api/posts/laudantium" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/posts/laudantium"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'https://laraclassified.bedigit.local/api/posts/laudantium',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (401):

```json
{
    "success": false,
    "message": "Unauthenticated or Token Expired, Please Login",
    "result": null,
    "error_code": 1
}
```
<div id="execution-results-DELETEapi-posts--ids-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-posts--ids-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-posts--ids-"></code></pre>
</div>
<div id="execution-error-DELETEapi-posts--ids-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-posts--ids-"></code></pre>
</div>
<form id="form-DELETEapi-posts--ids-" data-method="DELETE" data-path="api/posts/{ids}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-posts--ids-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-posts--ids-" onclick="tryItOut('DELETEapi-posts--ids-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-posts--ids-" onclick="cancelTryOut('DELETEapi-posts--ids-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-posts--ids-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/posts/{ids}</code></b>
</p>
<p>
<label id="auth-DELETEapi-posts--ids-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-posts--ids-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>ids</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ids" data-endpoint="DELETEapi-posts--ids-" data-component="url" required  hidden>
<br>
The ID or comma-separated IDs list of post(s).
</p>
</form>


## Email: Re-send link


Re-send email verification link to the user

> Example request:

```bash
curl -X GET \
    -G "https://laraclassified.bedigit.local/api/posts/earum/verify/resend/email?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/posts/earum/verify/resend/email"
);

let params = {
    "entitySlug": "users",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://laraclassified.bedigit.local/api/posts/earum/verify/resend/email',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'entitySlug'=> 'users',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-GETapi-posts--id--verify-resend-email" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id--verify-resend-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id--verify-resend-email"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id--verify-resend-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id--verify-resend-email"></code></pre>
</div>
<form id="form-GETapi-posts--id--verify-resend-email" data-method="GET" data-path="api/posts/{id}/verify/resend/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id--verify-resend-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts--id--verify-resend-email" onclick="tryItOut('GETapi-posts--id--verify-resend-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts--id--verify-resend-email" onclick="cancelTryOut('GETapi-posts--id--verify-resend-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts--id--verify-resend-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/{id}/verify/resend/email</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-posts--id--verify-resend-email" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-posts--id--verify-resend-email" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>


## SMS: Re-send code


Re-send mobile phone verification token by SMS

> Example request:

```bash
curl -X GET \
    -G "https://laraclassified.bedigit.local/api/posts/et/verify/resend/sms?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/posts/et/verify/resend/sms"
);

let params = {
    "entitySlug": "users",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://laraclassified.bedigit.local/api/posts/et/verify/resend/sms',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'entitySlug'=> 'users',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-GETapi-posts--id--verify-resend-sms" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts--id--verify-resend-sms"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id--verify-resend-sms"></code></pre>
</div>
<div id="execution-error-GETapi-posts--id--verify-resend-sms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id--verify-resend-sms"></code></pre>
</div>
<form id="form-GETapi-posts--id--verify-resend-sms" data-method="GET" data-path="api/posts/{id}/verify/resend/sms" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id--verify-resend-sms', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts--id--verify-resend-sms" onclick="tryItOut('GETapi-posts--id--verify-resend-sms');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts--id--verify-resend-sms" onclick="cancelTryOut('GETapi-posts--id--verify-resend-sms');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts--id--verify-resend-sms" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/{id}/verify/resend/sms</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-posts--id--verify-resend-sms" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-posts--id--verify-resend-sms" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>


## Verification


Verify the user's email address or mobile phone number

> Example request:

```bash
curl -X GET \
    -G "https://laraclassified.bedigit.local/api/posts/verify/est/dolorem?entitySlug=users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/posts/verify/est/dolorem"
);

let params = {
    "entitySlug": "users",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'https://laraclassified.bedigit.local/api/posts/verify/est/dolorem',
    [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'entitySlug'=> 'users',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Page Not Found."
}
```
<div id="execution-results-GETapi-posts-verify--field---token--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-posts-verify--field---token--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts-verify--field---token--"></code></pre>
</div>
<div id="execution-error-GETapi-posts-verify--field---token--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts-verify--field---token--"></code></pre>
</div>
<form id="form-GETapi-posts-verify--field---token--" data-method="GET" data-path="api/posts/verify/{field}/{token?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-posts-verify--field---token--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-posts-verify--field---token--" onclick="tryItOut('GETapi-posts-verify--field---token--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-posts-verify--field---token--" onclick="cancelTryOut('GETapi-posts-verify--field---token--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-posts-verify--field---token--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/posts/verify/{field}/{token?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>field</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="field" data-endpoint="GETapi-posts-verify--field---token--" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>token</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="token" data-endpoint="GETapi-posts-verify--field---token--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>entitySlug</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="entitySlug" data-endpoint="GETapi-posts-verify--field---token--" data-component="query"  hidden>
<br>
The slug of the entity to verify ('users' or 'posts').
</p>
</form>



