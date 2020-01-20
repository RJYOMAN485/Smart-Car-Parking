/*
  WriteSingleField
  
  Description: Writes a value to a channel on ThingSpeak every 20 seconds.
  
  Hardware: ESP8266 based boards
  
  !!! IMPORTANT - Modify the secrets.h file for this project with your network connection and ThingSpeak channel details. !!!
  
  Note:
  - Requires ESP8266WiFi library and ESP8622 board add-on. See https://github.com/esp8266/Arduino for details.
  - Select the target hardware from the Tools->Board menu
  - This example is written for a network using WPA encryption. For WEP or WPA, change the WiFi.begin() call accordingly.
  
  ThingSpeak ( https://www.thingspeak.com ) is an analytic IoT platform service that allows you to aggregate, visualize, and 
  analyze live data streams in the cloud. Visit https://www.thingspeak.com to sign up for a free account and create a channel.  
  
  Documentation for the ThingSpeak Communication Library for Arduino is in the README.md folder where the library was installed.
  See https://www.mathworks.com/help/thingspeak/index.html for the full ThingSpeak documentation.
  
  For licensing information, see the accompanying license file.
  
  Copyright 2018, The MathWorks, Inc.
*/

#include "ThingSpeak.h"
#include <ESP8266WiFi.h>
#define trigPin 5
#define echoPin 4


#define SECRET_SSID "Redmi"    // replace MySSID with your WiFi network name
#define SECRET_PASS "rajendra"  // replace MyPassword with your WiFi password

#define SECRET_CH_ID 914849     // replace 0000000 with your channel number
#define SECRET_WRITE_APIKEY "8E1PBKJFQ3CQZ932"
float duration, distance;

//int LED = D3;

char ssid[] = SECRET_SSID;   // your network SSID (name) 
char pass[] = SECRET_PASS;   // your network password
int keyIndex = 0;            // your network key Index number (needed only for WEP)
WiFiClient  client;

unsigned long myChannelNumber = SECRET_CH_ID;
const char * myWriteAPIKey = SECRET_WRITE_APIKEY;


void setup() {
  Serial.begin(9600);  // Initialize serial

  WiFi.mode(WIFI_STA); 
  ThingSpeak.begin(client);  // Initialize ThingSpeak

    pinMode(trigPin,OUTPUT); //sending pulses out from the arduino to the device
  pinMode(echoPin, INPUT); //input back from the device
  //digitalWrite(LED, LOW);

  if(WiFi.status() != WL_CONNECTED){
    Serial.print("Attempting to connect to SSID: ");
    Serial.println(SECRET_SSID);
    while(WiFi.status() != WL_CONNECTED){
      WiFi.begin(ssid, pass);  // Connect to WPA/WPA2 network. Change this line if using open or WEP network
      Serial.print(".");
      delay(5000);     
    } 
    Serial.println("\nConnected.");
  }
  
}

void loop() {

  // Connect or reconnect to WiFi
  
  
  
  // change the value
  
  
  delay(500); // Wait 20 seconds to update the channel again
  // put your main code here, to run repeatedly:
  digitalWrite(trigPin,LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin,HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin,LOW);

  //Measure the response from the sensor Echo Pin

  duration=pulseIn(echoPin,HIGH);

  //Determine the distance from duration
  //Use 343 metres per second as speed of sound
  distance=duration*0.0343/2;

  //send results to the Serial Monitor

  //Serial.print("Distance = ");
  if(distance <=30 ){
    //Serial.println("Out of range");
  //}
  //else {
    // Write to ThingSpeak. There are up to 8 fields in a channel, allowing you to store up to 8 different
  // pieces of information in a channel.  Here, we write to field 1.
      int x = ThingSpeak.writeField(myChannelNumber, 1, 0, myWriteAPIKey);
      if(x == 200){
        Serial.println("Channel update successful.");
      }
     else{
         Serial.println("Problem updating channel. HTTP error code " + String(x));
     }
  }   
  else {
  //digitalWrite(LED, LOW);
    int x = ThingSpeak.writeField(myChannelNumber, 1, 1, myWriteAPIKey);
      if(x == 200){
        Serial.println("Channel update successful.");
      }
     else{
         Serial.println("Problem updating channel. HTTP error code " + String(x));
     }
  }
}
