const int relay = D5;

void setup() {
  Serial.begin(9600);
  pinMode( relay, OUTPUT);

}

void loop() {
  //Normally open configuration, send LOW signal to let current flow
  //If you are using normally closed configuration send HIGH signal
  digitalWrite(relay, HIGH);
  Serial.print("Current Flowing");
  Serial.print("\n");
  delay(5000);

  //Normally open configuration, send HIGH signal to stop current flow
  //If you are using normally closed configuration send LOW signal
  digitalWrite(relay, LOW);
  Serial.print("Current not Flowing");
  Serial.print("\n");
  delay(5000);
}