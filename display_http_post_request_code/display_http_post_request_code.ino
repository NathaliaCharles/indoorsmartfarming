String humidity = String (h,2);
String temperature = String (t,2);
String moisture = String (m,2);
String heat_index = String (hic,2);

Serial.printIn("Temperature: " +temperature);
Serial.printIn("Humidity: " +humidity);
Serial.printIn("Moisture: " +moisture);
//Serial.printIn("heat_index);
Serial.printIn("---------------------------------");
//------------------------------------------------------------
//HTTP POST request data
String temperature_data;
temperature_data = "api_key= " +PROJECT_API_KEY;
temperature_data += "&temperature=" +temperature;
temperature_data += "&humidity=" +humidity;
temperature_data += "&moisture=" +moisture;