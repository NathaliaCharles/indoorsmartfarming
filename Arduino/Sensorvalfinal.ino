#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
#endif

#include <Servo.h>
#include <Wire.h>
#include <DHT.h>

#define DHTTYPE DHT22

DHT dht(D4,DHTTYPE); 
Servo myservo;

int servoPin = 5;
float sensor_pin = A0; 
const int pump = D5;      // digital pin where the relay is plugged in
const int threshold = 10;  //threshold value to trigger pump

// Replace with your network credentials
const char* ssid = "Telecom - BK2a";
const char* password = "92NG6nr9";

// REPLACE with your Domain name and URL path or IP address with path
const char* SERVER_NAME = "http://indoorsmartfarming.atwebpages.com/post-data.php";

String PROJECT_API_KEY = "Hello_World";


unsigned long lastMillis = 0;
long interval = 5000;
//-------------------------------------------------------------------

/*
 * *******************************************************************
 * setup() function
 * *******************************************************************
 */
void setup() {
  
  //-----------------------------------------------------------------
  Serial.begin(9600);
  Serial.println("esp32 serial initialize");
  //-----------------------------------------------------------------
  dht.begin();
  myservo.attach(servoPin);
  //-----------------------------------------------------------------
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
 
  Serial.println("Timer set to 5 seconds (timerDelay variable),");
  Serial.println("it will take 5 seconds before publishing the first reading.");
  //-----------------------------------------------------------------

  pinMode(pump, OUTPUT); //setup for the pump aka OUTPUT
  Serial.println("Initialize pump to off state.");
  delay(20);
  //initialize pump
  digitalWrite(pump, LOW);
  delay(10);
}


/*
 * *******************************************************************
 * loop() function
 * *******************************************************************
 */
void loop() {
  
  //-----------------------------------------------------------------
  //Check WiFi connection status
  if(WiFi.status()== WL_CONNECTED){
    if(millis() - lastMillis > interval) {
       //Send an HTTP POST request every interval seconds
       upload_temperature();
       lastMillis = millis();
    }
  }
  //-----------------------------------------------------------------
  else {
    Serial.println("WiFi Disconnected");
  }
  //-----------------------------------------------------------------

  delay(1000);  
}


void upload_temperature()
{
  //--------------------------------------------------------------------------------
  //Sensor readings may also be up to 2 seconds 'old' (its a very slow sensor)
  //Read temperature as Celsius (the default)
  
  float m = analogRead(sensor_pin);
  m = map(m,550,0,0,100);
  
  float t = dht.readTemperature();
  
  float h = dht.readHumidity();

  if (isnan(h) || isnan(t) || isnan(m)) {
    Serial.println(F("Failed to read from DHT sensor! or soil moisture sensor"));
    return;
  }
  
  //Compute heat index in Celsius (isFahreheit = false)
  float hic = dht.computeHeatIndex(t, h, false);
  //--------------------------------------------------------------------------------
  //°C
  String humidity = String(h, 2);
  String temperature = String(t, 2);
  String moisture = String(m, 2);
  String heat_index = String(hic, 2);

  Serial.println("Temperature: "+temperature);
  Serial.println("Humidity: "+humidity);
  Serial.println("Moisture: "+moisture);
  //Serial.println(heat_index);
  Serial.println("--------------------------");
  //--------------------------------------------------------------------------------
  //HTTP POST request data
  String temperature_data;
  temperature_data = "api_key="+PROJECT_API_KEY;
  temperature_data += "&temperature="+temperature;
  temperature_data += "&humidity="+humidity;
  temperature_data += "&moisture="+moisture;


  Serial.print("temperature_data: ");
  Serial.println(temperature_data);
  //--------------------------------------------------------------------------------
  
  WiFiClient client;
  HTTPClient http;

  http.begin(client, SERVER_NAME);
  // Specify content-type header
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  // Send HTTP POST request
  int httpResponseCode = http.POST(temperature_data);
  //--------------------------------------------------------------------------------
  // If you need an HTTP request with a content type: 
  //application/json, use the following:
  //http.addHeader("Content-Type", "application/json");
  //temperature_data = "{\"api_key\":\""+PROJECT_API_KEY+"\",";
  //temperature_data += "\"temperature\":\""+temperature+"\",";
  //temperature_data += "\"humidity\":\""+humidity+"\"";
  //temperature_data += "}";
  //int httpResponseCode = http.POST(temperature_data);
  //--------------------------------------------------------------------------------
  // If you need an HTTP request with a content type: text/plain
  //http.addHeader("Content-Type", "text/plain");
  //int httpResponseCode = http.POST("Hello, World!");
  //--------------------------------------------------------------------------------
  Serial.print("HTTP Response code: ");
  Serial.println(httpResponseCode);

  if (m < threshold)  //if the soil is dry then turn on pump
    {
    digitalWrite(pump, HIGH);
    Serial.println("pump on");
    delay(1000);  //run pump for 1 second;
    digitalWrite(pump, LOW);
    Serial.println("pump off");
    delay(2000);//wait 2 secondS.
    }
    else
    {
    digitalWrite(pump, LOW);
    Serial.println("do not turn on pump");
    }
 if(t>25)
  { 
    myservo.writeMicroseconds(1000);
  }
  else
  {
    myservo.writeMicroseconds(2000);
  }
      //delay(300000); //wait 5 minutes
    delay(1000);// wait 1 second. This is for testing, uncomment the line above when implementing
  // Free resources
  http.end();
  }
