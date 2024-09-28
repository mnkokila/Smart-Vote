import React, { useContext, useState } from 'react';
import { Text, View, StyleSheet, TextInput, Button } from 'react-native';
import { useNavigation } from '@react-navigation/native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import Spinner from 'react-native-loading-spinner-overlay';
import { AuthContext } from "../context/AuthContext";
import { BASE_URL } from '../config';

//function RegisterScreen() {
  const RegisterScreen = ({navigation}) => {
  const [nic, setNic] = useState(null);
  const [email, setEmail] = useState(null);
  const [password, setPassword] = useState(null);
  const [membername, setMembername] = useState(null);
  const {isLoading, register} = useContext(AuthContext);
  //const navigation = useNavigation(); // Move it here

  /*const checkTextInput = async () => {
    // Check for the Name TextInput
    //console.log(BASE_URL + '/login');
    if (!nic || !password || !email || !membername) {
      alert('Please Fill All Fields');
      return;
    } else {
        register(nic,email,password,membername)
    }
  }; */

  const checkTextInput = async () => {

    if (!nic || !password || !email || !membername) {
      alert('Please Fill All Fields');
      return;
    }else{
        try{
          const requestData = {
            nic: nic,
            email: email,
            password: password,
            membername: membername,
          };

          const response = await fetch(BASE_URL + '/register', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(requestData),
          });
          let data = await response.json();
          console.log(data)
          //alert("success")
          alert(data.message)
        } catch (error) {
          console.error('Error during registration:', error);
        }
    }

  };



  return (
    <View style={styles.container}>
      <Spinner visible={isLoading} />
      <View style={styles.wrapper}>
        <Text style={styles.titletext}>Registration Form</Text>
        <TextInput
          style={styles.inputs}
          value={nic}
          placeholder="Enter Nic"
          placeholderTextColor="#000"
          onChangeText={text => setNic(text)}
        />

        <TextInput
          style={styles.inputs}
          value={email}
          placeholder="Enter Email"
          placeholderTextColor="#000"
          onChangeText={text => setEmail(text)}
          
        />

        <TextInput
          style={styles.inputs}
          value={password}
          placeholder="Enter Password"
          placeholderTextColor="#000"
          onChangeText={text => setPassword(text)}
          secureTextEntry
        />

        <TextInput
          style={styles.inputs}
          value={membername}
          placeholder="Enter Your Name"
          placeholderTextColor="#000"
          onChangeText={text => setMembername(text)}
          
        />

        <Button title="Register" onPress={checkTextInput} />

        <Text style={{display:'flex',flexDirection:'row',columnGap:2,color:'black',paddingTop:20}}>
           <Text>Already Have an Account? </Text> <Text  onPress={() => navigation.navigate('Login')}>Login</Text>
        </Text>
        
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
  },
  wrapper: {
    width: '80%',
  },
  inputs: {
    marginBottom: 12,
    borderWidth: 1,
    borderColor: '#bbb',
    borderRadius: 5,
    paddingHorizontal: 14,
    color: 'black',
  },
  titletext: {
    fontSize: 24,
    marginBottom: 40,
    color: '#000',
  },
  registerTextStyle: {
    color: '#000',
    textAlign: 'center',
    fontWeight: 'bold',
    fontSize: 14,
    alignSelf: 'center',
    padding: 10,
  },
});

export default RegisterScreen;
