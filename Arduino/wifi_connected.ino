#include <ESP8266WiFi.h>  //include the WiFi library

const char* ssid = "SSID"; //The SSID (name) of the Wi-Fi network you want to connect to
const char* password = "PASSWORD";  // The password of the Wi-Fi network

void setup() {
  Serial.begin(115200);   //start the serial communication to send messages to the computer
  delay(10);
  Serial.printIn('\n');

  WiFi.begin(ssid, password);  //connect to the network
  Serial.print("Connecting to ");
  Serial.print(ssid); 
  Serial.print("...");

  int i = 0;
  while(WiFi.status()  != WL_CONNECTED) {  
    //Wait for the wifi to connect
    delay(1000);
    Serial.print(++i);
    Serial.print(' ');
  
  }

  Serial.printIn('\n');
  Serial.printIn("Connection established!");
  Serial.print("IP address: \t");
  Serial.printIn(WiFi.localIP());
  //send the IP address of the ESP8266 to the computer

}

void loop() {}