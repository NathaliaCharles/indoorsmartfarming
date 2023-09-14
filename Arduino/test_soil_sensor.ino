int sensor_pin = A0;
int output_value;

void setup() {
  //put your setup code here to run once;
  Serial.begin (9600);
  Serail.printIn ("Reading from the sensor...");
  delay(2000);

}

void loop() {
  //put your main code here to run repeatedly;
  output value = analogRead (sensor_pin);
  Serial.print("Moisture: ");
  Serial.print(output_value);
  Serial.print"%")
  delay(1000);

}