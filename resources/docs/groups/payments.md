# Payments


## List payments

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://laraclassified.bedigit.local/api/payments?embed=labore" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/payments"
);

let params = {
    "embed": "labore",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
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
    'https://laraclassified.bedigit.local/api/payments',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'labore',
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
<div id="execution-results-GETapi-payments" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-payments"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payments"></code></pre>
</div>
<div id="execution-error-GETapi-payments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-payments"></code></pre>
</div>
<form id="form-GETapi-payments" data-method="GET" data-path="api/payments" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-payments', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-payments" onclick="tryItOut('GETapi-payments');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-payments" onclick="cancelTryOut('GETapi-payments');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-payments" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/payments</code></b>
</p>
<p>
<label id="auth-GETapi-payments" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-payments" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-payments" data-component="query"  hidden>
<br>
Comma-separated list of the payment relationships for Eager Loading. Possible values: post,paymentMethod,package,currency
</p>
</form>


## Get payment

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "https://laraclassified.bedigit.local/api/payments/animi?embed=nesciunt" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs"
```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/payments/animi"
);

let params = {
    "embed": "nesciunt",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
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
    'https://laraclassified.bedigit.local/api/payments/animi',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'embed'=> 'nesciunt',
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
<div id="execution-results-GETapi-payments--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-payments--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payments--id-"></code></pre>
</div>
<div id="execution-error-GETapi-payments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-payments--id-"></code></pre>
</div>
<form id="form-GETapi-payments--id-" data-method="GET" data-path="api/payments/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-payments--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-payments--id-" onclick="tryItOut('GETapi-payments--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-payments--id-" onclick="cancelTryOut('GETapi-payments--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-payments--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/payments/{id}</code></b>
</p>
<p>
<label id="auth-GETapi-payments--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-payments--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-payments--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>embed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="embed" data-endpoint="GETapi-payments--id-" data-component="query"  hidden>
<br>
Comma-separated list of the payment relationships for Eager Loading. Possible values: post,paymentMethod,package,currency
</p>
</form>


## Store payment

<small class="badge badge-darkred">requires authentication</small>

Note: This endpoint is only available for the multi steps post edition.

> Example request:

```bash
curl -X POST \
    "https://laraclassified.bedigit.local/api/payments?package=6" \
    -H "Authorization: Bearer {YOUR_AUTH_TOKEN}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Content-Language: en" \
    -H "X-AppApiToken: Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=" \
    -H "X-AppType: docs" \
    -d '{"country_code":"US","post_id":2,"package_id":15,"payment_method_id":5}'

```

```javascript
const url = new URL(
    "https://laraclassified.bedigit.local/api/payments"
);

let params = {
    "package": "6",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_TOKEN}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Language": "en",
    "X-AppApiToken": "Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=",
    "X-AppType": "docs",
};

let body = {
    "country_code": "US",
    "post_id": 2,
    "package_id": 15,
    "payment_method_id": 5
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'https://laraclassified.bedigit.local/api/payments',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_TOKEN}',
            'Accept' => 'application/json',
            'Content-Language' => 'en',
            'X-AppApiToken' => 'Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=',
            'X-AppType' => 'docs',
        ],
        'query' => [
            'package'=> '6',
        ],
        'json' => [
            'country_code' => 'US',
            'post_id' => 2,
            'package_id' => 15,
            'payment_method_id' => 5,
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
    "message": "Post not found",
    "result": null,
    "error_code": 1
}
```
<div id="execution-results-POSTapi-payments" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-payments"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-payments"></code></pre>
</div>
<div id="execution-error-POSTapi-payments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-payments"></code></pre>
</div>
<form id="form-POSTapi-payments" data-method="POST" data-path="api/payments" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_TOKEN}","Content-Type":"application\/json","Accept":"application\/json","Content-Language":"en","X-AppApiToken":"Uk1DSFlVUVhIRXpHbWt6d2pIZjlPTG15akRPN2tJTUs=","X-AppType":"docs"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-payments', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-payments" onclick="tryItOut('POSTapi-payments');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-payments" onclick="cancelTryOut('POSTapi-payments');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-payments" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/payments</code></b>
</p>
<p>
<label id="auth-POSTapi-payments" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-payments" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>package</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="package" data-endpoint="POSTapi-payments" data-component="query"  hidden>
<br>
Selected package ID.
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>country_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="country_code" data-endpoint="POSTapi-payments" data-component="body" required  hidden>
<br>
The code of the user's country.
</p>
<p>
<b><code>post_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="post_id" data-endpoint="POSTapi-payments" data-component="body" required  hidden>
<br>
The post's ID.
</p>
<p>
<b><code>package_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="package_id" data-endpoint="POSTapi-payments" data-component="body" required  hidden>
<br>
The package's ID (Auto filled when the query parameter 'package' is set).
</p>
<p>
<b><code>payment_method_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="payment_method_id" data-endpoint="POSTapi-payments" data-component="body"  hidden>
<br>
The payment method's ID (required when the selected package's price is > 0).
</p>

</form>



