import React, { useEffect, useState,useContext } from 'react';
import { Text, View, StyleSheet, FlatList, TouchableOpacity } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import {Card} from 'react-native-shadow-cards';
import { BASE_URL } from '../config';
import LogoutButton from '../components/LogoutButton';
import { logout } from '../utils/auth';
import { AuthContext } from "../context/AuthContext";

const HomeScreen = ({ navigation }) => {
  const [userData, setUserData] = useState(null);
  const [apiData, setApiData] = useState([]);
 
  const {userInfo,electionList,isLoading,logout} = useContext(AuthContext);


  useEffect(() => {
    const getUserData = async () => {
      try {
        const userDataJSON = await AsyncStorage.getItem('userInfo');
        if (userDataJSON !== null) {
          const parsedUserData = JSON.parse(userDataJSON);
          setUserData(parsedUserData);
          

          fetch(BASE_URL + '/available_org?nic=' + parsedUserData.nic)
            .then((response) => response.json())
            .then((data) => {
              console.log(data);
              setApiData(data);
              //setIsLoading(false);
            })
            .catch((error) => console.error('API Error:', error));
        }
      } catch (error) {
        console.error('Error getting user data:', error);
      }
    };
    getUserData();

    
  }, []); 

  return (
    <View style={styles.container}>
      <View style={{ marginVertical: 10 }}>
        <Text style={styles.welcome}>Welcome {userInfo.member}</Text>
      </View>

      <Text style={styles.helptext}>Please select the organization to see the available elections</Text>


      {isLoading ? (
        <View style={styles.loadingContainer}>
          <Text>Loading...</Text>
        </View>
      ) : apiData.status == 200 ? (
        
        <FlatList
          
          data={apiData.records}
          keyExtractor={(item) => 
            item.org_id.toString()}
          renderItem={({ item }) => (
            <TouchableOpacity
              onPress={() => {
                // Handle card press action
                //console.log(`Card pressed: ${item.election_name}`);
                
                navigation.navigate('elections',{orgname:item.org_name,orgid:item.org_id})
              }}
            >
              <Card style={{padding: 30, margin: 10}}>
                <Text style={styles.cardtext}>{item.org_name}</Text>
              </Card>
            </TouchableOpacity>
          )}
        />
      ) : (
        <View>
          <Text style={styles.noDataContainer}>Dont Have Elections Right Now</Text>
        </View>
      )}
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    alignItems: 'center',
    justifyContent: 'center',
  },
  card: {
    margin: 16,
    padding: 16,
    backgroundColor: '#fff',
    borderRadius: 8,
    elevation: 3,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.3,
    shadowRadius: 2,
  },
  welcome: {
    fontSize: 25,
    color: '#000',
    marginBottom: 8,
    marginTop: 20,
    fontWeight:'bold',
  },
  loadingContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  cardtext:{
    color:'#000',
    textAlign: 'center',
    fontWeight:'bold',
  },
  noDataContainer:{
    color:'#000',
    textAlign: 'center',
  },
  helptext:{
    fontWeight:'bold',
    fontSize:18,
    textAlign: 'center',
    color:'#EF9529',
  }
});

export default HomeScreen;