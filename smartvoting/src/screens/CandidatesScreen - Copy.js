import React, { useEffect, useState,useContext } from 'react';
import { Text, View, StyleSheet, FlatList, TouchableOpacity } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import {Card} from 'react-native-shadow-cards';
import { BASE_URL } from '../config';
import LogoutButton from '../components/LogoutButton';
import { logout } from '../utils/auth';
import { AuthContext } from "../context/AuthContext";
import { useRoute } from '@react-navigation/native';

const CandidatesScreen = ({ navigation }) => {
  const [userData, setUserData] = useState(null);
  const [apiData, setApiData] = useState([]);

  const route = useRoute();
  const { pname,pid } = route.params;
 
  const {userInfo,electionList,isLoading,logout} = useContext(AuthContext);
   
  console.log(pname)
  console.log(pid)

  useEffect(() => {
    const getUserData = async () => {
      try {
        const userDataJSON = await AsyncStorage.getItem('userInfo');
        if (userDataJSON !== null) {
          const parsedUserData = JSON.parse(userDataJSON);
          setUserData(parsedUserData);
          

          fetch(BASE_URL + '/candidate_list?positionid=' + pid)
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

  const markVote = async (userid,electionid,position_id) =>{
    try {
        const userDataJSON = await AsyncStorage.getItem('userInfo');
        if (userDataJSON !== null) {
            const parsedUserData = JSON.parse(userDataJSON);
            console.log(userid,electionid)
          

          fetch(BASE_URL + '/vote_add?candidate_id=' + userid +'&voter_id=' + parsedUserData.nic + '&electionid=' + electionid + "&positionid=" + position_id)
            .then((response) => response.json())
            .then((data) => {
              console.log(data);
              //setApiData(data);
              //setIsLoading(false);
              alert(data.message)
            })
            .catch((error) => console.error('API Error:', error));
        }
      } catch (error) {
        console.error('Error getting user data:', error);
      }
      
  };

  return (
    <View style={styles.container}>
      <View style={{ marginVertical: 10 }}>
        <Text style={styles.welcome}> {pname} Candidates</Text>
      </View>

      

      {isLoading ? (
        <View style={styles.loadingContainer}>
          <Text>Loading...</Text>
        </View>
      ) : apiData.status == 200 ? (
        
        <FlatList
          
          data={apiData.records}
          keyExtractor={(item) => 
            item.user_id.toString()}
          renderItem={({ item }) => (
            <TouchableOpacity
              onPress={() => {
                // Handle card press action
                //console.log(`Card pressed: ${item.user_id}`);
                markVote(item.user_id,item.election_id,item.position_id);
              }}
            >
              <Card style={{padding: 30, margin: 10}}>
                <Text style={styles.cardtext}>{item.user_full_name}</Text>
              </Card>
            </TouchableOpacity>
          )}
        />
      ) : (
        <View>
          <Text style={styles.noDataContainer}>Dont Have Candidates Right Now</Text>
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
  },
  loadingContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  cardtext:{
    color:'#000',
    textAlign: 'center',
  },
  noDataContainer:{
    color:'#000',
    textAlign: 'center',
  }
});

export default CandidatesScreen;