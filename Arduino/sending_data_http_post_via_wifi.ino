WiFiClient client;
HTTPClient http;

http.begin (client, SERVER_NAME);
//Specify content-type header
http.addHeader ("Content-Type", "application/x-www-form-urlencoded");
//Send HTTP POST request
int httpResponseCode = http.POST (temperature_data);
Serial.print("HTTP Response Code");
Serial.printIn(httpResponseCode);


