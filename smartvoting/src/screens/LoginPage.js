import React, { useContext, useState } from 'react';
import { Text, View, StyleSheet, TextInput, Button } from 'react-native';
import { useNavigation } from '@react-navigation/native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import Spinner from 'react-native-loading-spinner-overlay';
import { AuthContext } from "../context/AuthContext";
import { BASE_URL } from '../config';

//function LoginPage() {
  const LoginPage = ({ navigation }) => {
  const [username, setUsername] = useState(null);
  const [password, setPassword] = useState(null);
  const {isLoading, login} = useContext(AuthContext);
  //const navigation = useNavigation(); // Move it here

  const checkTextInput = async () => {
    // Check for the Name TextInput
    console.log(BASE_URL + '/login');
    if (!username || !password) {
      alert('Please Enter Username and Password');
      return;
    } else {
      login(username,password)
    }
  };

  return (
    <View style={styles.container}>
      <Spinner visible={isLoading} />
      <View style={styles.wrapper}>
        <Text style={styles.titletext}>Welcome To Smart Voting</Text>
        <TextInput
          style={styles.inputs}
          value={username}
          placeholder="Enter Email"
          placeholderTextColor="#000"
          onChangeText={text => setUsername(text)}
        />

        <TextInput
          style={styles.inputs}
          value={password}
          placeholder="Enter Password"
          placeholderTextColor="#000"
          onChangeText={text => setPassword(text)}
          secureTextEntry
        />

        <Button title="Login" onPress={checkTextInput} />
        
        <Text style={{display:'flex',flexDirection:'row',columnGap:2,color:'black',paddingTop:20}}>
           <Text>Not a member? </Text> <Text  onPress={() => navigation.navigate('Register')}>Register</Text>
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

export default LoginPage;
