import React, { useEffect, useState,useContext } from 'react';
import { Text, View, StyleSheet, FlatList, TouchableOpacity, Button } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import {Card} from 'react-native-shadow-cards';
import { BASE_URL } from '../config';
import LogoutButton from '../components/LogoutButton';
import { logout } from '../utils/auth';
import { AuthContext } from "../context/AuthContext";
import { useRoute } from '@react-navigation/native';
import { green } from 'react-native-reanimated';

const PositionScreen = ({ navigation }) => {
  const [userData, setUserData] = useState(null);
  const [apiData, setApiData] = useState([]);
 
  const {userInfo,electionList,isLoading,logout} = useContext(AuthContext);
  
  const route = useRoute();
  const { orgname,orgid } = route.params;

  useEffect(() => {
    const getUserData = async () => {
      try {
        const userDataJSON = await AsyncStorage.getItem('userInfo');
        if (userDataJSON !== null) {
          const parsedUserData = JSON.parse(userDataJSON);
          setUserData(parsedUserData);
          

          fetch(BASE_URL + '/available_elections?orgid=' + orgid)
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
        <View style={{ marginVertical: 10 }}>
        <Text style={styles.welcome}>{orgname}</Text>
        <Text style={styles.helptext}>Please click the election to vote for the available positions</Text>

          <Button title="View Past Results" onPress={() => navigation.navigate('results',{orgname:orgname,orgid:orgid})} />
        </View>
         

        
      </View>

      <View style={{flexDirection: 'row', alignItems: 'center'}}>
  <View style={{flex: 1, height: 1, backgroundColor: 'black'}} />
  <View>
    <Text style={{width: 95, textAlign: 'center',fontSize:20,fontWeight:'bold'}}>Elections</Text>
  </View>
  <View style={{flex: 1, height: 1, backgroundColor: 'black'}} />
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
            item.election_main_id.toString()}
          renderItem={({ item }) => (
            <TouchableOpacity
              onPress={() => {
                // Handle card press action
                //console.log(`Card pressed: ${item.election_name}`);
                
                navigation.navigate('positions',{electionname:item.election_name,electionid:item.election_main_id,orgname:orgname,orgid:orgid})
              }}
            >
              <Card style={{padding: 30, margin: 10}}>
                <Text style={styles.cardtext}>{item.election_name} - {item.elect_year}</Text>
                <Text style={styles.details}>{item.election_start} to {item.election_end}</Text>
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
    fontWeight:'bold',
    color:'#000',
    textAlign: 'center',
  },
  details:{
    paddingTop:8,
    fontSize:13,
    color:'#000',
    textAlign: 'center',
  },
  noDataContainer:{
    color:'#000',
    textAlign: 'center',
    paddingTop:15
  },
  helptext:{
    fontWeight:'bold',
    fontSize:18,
    textAlign: 'center',
    color:'#EF9529',
    paddingBottom:15
  }
});

export default PositionScreen;