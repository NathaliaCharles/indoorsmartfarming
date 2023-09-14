#include <DHT.h>
#define datapin 2
#define DHTType DHT22
DHT dht = DHT (datapin, DHTType);

void setup() 
{
  //put your setup code here to run once;
  Serial.begin (9600);
  dht.begin();

}

void loop() 
{
  //put your main code to run repeatedly:
  delay(2000);
  float h = dht.readHumidity();
  float t = dht.readTemperature();

  if (isnan(h) || isnan(t)) {
    Serial.print("Failed to read from the DHT sensor, check wiring.");
    return;
    Serial.print('\n');
  }
  //print out the humidity
  Serial.print("Humidity: ");
  Serial.print(h);
  //print t=out the temperature
  Serial.print(" % || Temperature: ");
  Serial.print(t);
  Serial.print(" C");
  Serial.print('\n');
  
}
