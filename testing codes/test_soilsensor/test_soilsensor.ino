int sensor_pin = A0;
int output_value;

void setup() {
  //put your setup code here to run once;
  Serial.begin (9600);
  Serial.print ("Reading from the sensor...");
  delay(2000);

}

void loop() {
  //put your main code here to run repeatedly;
  output_value = analogRead (sensor_pin);
  output_value = map(output_value,550,0,0,100);
  Serial.print("Moisture: ");
  Serial.print(output_value);
  Serial.print("%");
  delay(1000);
  Serial.print("\n");

}
