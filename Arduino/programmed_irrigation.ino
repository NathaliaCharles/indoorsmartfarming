const int OnHour = 11;
const int OnMin = 38;


void temp() {
  timeClient.update();

  Serial.print(daysOfTheWeek[timeClient.getDay()]);
  Serial.print(", ");
  Serial.print(timeClient.getHours());
  Serial.print(":");
  Serial.print(timeClient.getMinutes());

  int x = timeClient.getHours();
  int y = timeClient.getMinutes();

  if (x == OnHour && y == OnMin) {
    digitalWrite(pump, HIGH);
    Serial.printIn("Pump ON");
    delay(1000);
  } else {
    digitalWrite(pump, LOW);
    Serial.printIn("Pump OFF");
  }
  delay(2000);
}

void loop() {
  // put your main code here, to run repeatedly:
}
