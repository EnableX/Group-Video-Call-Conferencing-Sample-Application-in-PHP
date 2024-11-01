# Creating a Multi-Party Real-Time Communication Web App with PHP and EnableX Web Toolkit

Multi-Party RTC Web App: PHP and EnableX Web Toolkit 

Explore a Sample Web App showcasing the use of EnableX platform APIs to create a fundamental Multi-Party RTC (Real-Time Communication) Application. This application aims to demonstrate API utilization and enables developers to accelerate app development by hosting it on their personal devices, eliminating the need for external servers. 

RTC Applications hosted on the EnableX platform operate seamlessly on supported web browsers, requiring no additional plugin downloads. 

This basic Multi-Party RTC Application is developed using HTML, CSS, Bootstrap, JavaScript, jQuery, PHP, and EnxRtc (EnableX Web Toolkit). 

> The details of the supported set of web browsers can be found here:
> https://developer.enablex.io/docs/references/sdks/video-sdk/web-sdk/index/


## 1. Important!

When developing a Client Application with EnxRtc.js, make sure to include the updated EnxRtc.js polyfills from https://developer.enablex.io/docs/references/apis/video-api/index/ for RTCPeerConnection and getUserMedia. Otherwise your application will not work in web browsers.


## 2. Trial

Sign up for a free trial [https://www.enablex.io/free-trial/](https://www.enablex.io/free-trial/ ) or try our multiparty video chat https://try.enablex.io/.


## 3. Installation

### 3.1 Pre-Requisites

#### 3.1.1 App Id and App Key 

* Register with EnableX [https://www.enablex.io/free-trial/ ](https://www.enablex.io/free-trial/ )
* Create your Application
* Get your App ID and App Key
* Clone this repository `git clone https://github.com/EnableX/Group-Video-Call-Conferencing-Sample-Application-in-PHP.git --recursive`
### ![#f03c15](https://via.placeholder.com/15/f03c15/000000?text=+) Please note `--recursive` option. Repo should be cloned recursively to download `client` app. 
* You can copy the app into any sub-directory of hosted Website on Apache

#### 3.1.2 SSL Certificates

The Application needs to run on https. So, you need to use a valid SSL Certificate for your Domain and point your application to use them. 

However you may use self-signed Certificate to run this application locally. There are many Web Sites to get a Self-Signed Certificate generated for you, Google it. Few among them are:

* https://letsencrypt.org/
* https://www.sslchecker.com/csr/self_signed
* https://www.akadia.com/services/ssh_test_certificate.html  

As you have Certificate or created a Self-Signed Certificate, create a directory "certs" under your Sample Web App Directory. Copy your Certificate files (.key and .crt files)  to this directory. 

#### 3.1.3 Configure

Before you can run this application, configure the service by editing `api/config.php` file to meet project requirement:
```javascript 
  define("API_URL",	"https://api.enablex.io/v1");
  define("APP_ID",	"YOUR_APP_ID");
  define("APP_KEY",	"YOUR_APP_KEY");
```

### 3.2 Test 

* Open a browser and go to [https://yourdomain.com/path-to-sample-app/client/](https://yourdomain.com/path-to-sample-app/client/). The browser should load the App. 
* Allow access to Camera and Mic as and when prompted to start your first RTC Call through EnableX
* You need to Room ID to join. We have added a "Create Room" link below the login form. Click it to get a Room-Id prefilled in the form. 
* You can share the Room-ID with anyone to join your Conference.


## 4. Server API

EnableX Server API is a Rest API service meant to be called from Partners' Application Server to provision video enabled
meeting rooms. API Access is given to each Application through the assigned App ID and App Key. So, the App ID and App Key
are to be used as Username and Password respectively to pass as HTTP Basic Authentication header to access Server API.

For this application, the following Server API calls are used:
* https://developer.enablex.io/docs/references/apis/video-api/content/api-routes/#create-a-room - To create room to carry out a video session
* https://developer.enablex.io/docs/references/apis/video-api/content/api-routes/#create-a-token - To create Token for the given Room to join a session

To know more about Server API, go to:
https://developer.enablex.io/docs/references/apis/video-api/index/


## 5. Client API

Client End Point Application uses Web Toolkit EnxRtc.js to communicate with EnableX Servers to initiate and manage RTC Communications.

To know more about Client API, go to:
https://developer.enablex.io/docs/references/sdks/video-sdk/web-sdk/index/
