if (m < threshold) //if the soil is dry then turn on pump
{
  digitalWrite (pump, HIGH);
  Serial.printIn("pump on");
  delay(1000); //run pump for 1 second;
  digitalWrite (pump, LOW);
  Serial.printIn("pump off");
  delay(2000); //wait 2 seconds
}
else 
{
  digitalWrite (pump, LOW);
  Serial.printIn("do not turn on pump");
  
}