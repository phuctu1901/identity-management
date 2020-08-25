require("dotenv").config();
var Echo = require("laravel-echo-server");

/**
 * The Laravel Echo Server options.
 */

var options = {
//    "appKey": process.env.ECHO_KEY,
    "authHost": process.env.ECHO_AUTH_HOST,
    "authEndpoint": process.env.ECHO_AUTH_ENDPOINT,
    "database": process.env.ECHO_DATABASE,
    "databaseConfig": {
        "redis": {
            "port": 6379,
            "host": process.env.ECHO_REDIS_HOST
        },
        "sqlite": {
            "databasePath": process.env.ECHO_SQLITE_PATH
        }
    },
    "devMode": process.env.ECHO_DEV_MODE,
    "host": null,
    "protocol": process.env.ECHO_PROTOCOL,
    "port": process.env.ECHO_PORT,
    "referrers": [],
    "socketio": {},
    "sslCertPath": process.env.ECHO_SSL_CERT_PATH,
    "sslKeyPath": process.env.ECHO_SSL_KEY_PATH,
    "sslCertChainPath": process.env.ECHO_SSL_CERT_CHAIN_PATH,
//    "verifyAuthPath": true,
  //  "verifyAuthServer": true,
"sslPassphrase": "",
        "subscribers": {
                "http": true,
                "redis": true
        },
        "apiOriginAllow": {
                "allowCors": true,
                "allowOrigin": process.env.ECHO_ALLOW_ORIGIN,
                "allowMethods": "GET, POST",
                "allowHeaders": "Origin, Content-Type, X-Auth-Token, X-Requested-With, Accept, Authorization, X-CSRF-TOKEN, X-Socket-Id"
        }

};

/**
 * Run the Laravel Echo Server.
 */
Echo.run(options);
