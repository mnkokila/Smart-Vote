import React, { useEffect, useState,useContext } from 'react';
import { Text, View, StyleSheet, FlatList, TouchableOpacity } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import {Card} from 'react-native-shadow-cards';
import { BASE_URL } from '../config';
import LogoutButton from '../components/LogoutButton';
import { logout } from '../utils/auth';
import { AuthContext } from "../context/AuthContext";
import { useRoute } from '@react-navigation/native';

const PositionScreen = ({ navigation }) => {
  const [userData, setUserData] = useState(null);
  const [apiData, setApiData] = useState([]);
 
  const {userInfo,electionList,isLoading,logout} = useContext(AuthContext);
  
  const route = useRoute();
  const { electionname,electionid,orgname,orgid } = route.params;

  useEffect(() => {
    const getUserData = async () => {
      try {
        const userDataJSON = await AsyncStorage.getItem('userInfo');
        if (userDataJSON !== null) {
          const parsedUserData = JSON.parse(userDataJSON);
          setUserData(parsedUserData);
          

          fetch(BASE_URL + '/available_positions?electionid=' + electionid)
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
        <Text style={styles.welcome}>{electionname}</Text>
      </View>

      <Text style={styles.helptext}>Please click the election to vote for the available positions</Text>


      {isLoading ? (
        <View style={styles.loadingContainer}>
          <Text>Loading...</Text>
        </View>
      ) : apiData.status == 200 ? (
        
        <FlatList
          
          data={apiData.records}
          keyExtractor={(item) => 
            item.ep_id.toString()}
          renderItem={({ item }) => (
            <TouchableOpacity
              onPress={() => {
                // Handle card press action
                //console.log(`Card pressed: ${item.election_name}`);
                
                navigation.navigate('candidates',{pname:item.position,pid:item.ep_id,electid:electionid,electname:electionname,orgname:orgname,orgid:orgid})
              }}
            >
              <Card style={{padding: 30, margin: 10}}>
                <Text style={styles.cardtext}>{item.position}</Text>
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

export default PositionScreen;