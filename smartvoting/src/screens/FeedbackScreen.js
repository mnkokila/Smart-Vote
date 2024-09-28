import React, { useContext,useState }  from "react";
import { Text,View,StyleSheet, Button, TextInput } from "react-native";
import Spinner from "react-native-loading-spinner-overlay/lib";
import { AuthContext } from "../context/AuthContext";

const FeedbackScreen = ({ navigation }) => {
    const {userInfo,isLoading,logout} = useContext(AuthContext);
    const [eventID, setEventID] = useState(null);
 
    const checkTextInput = () => {
        //Check for the Name TextInput
        if (!eventID) {
          alert('Please Enter Event ID');
          return;
        }else{
            navigation.navigate('managefeedback', { eventID })
        }
        
      };

    return (
        <View style={styles.container}>
            <Spinner visible={isLoading} />
            <View style={{marginVertical: 10}}>
              <Text style={styles.welcome}>Welcome {userInfo.child_name}</Text>
            </View>

            <View style={{marginVertical: 10}}>
              <Text style={styles.welcome}>Please Enter Event ID</Text>
              <TextInput 
                    style={styles.inputs} 
                    value={eventID}
                    placeholder="Enter Event ID" 
                    placeholderTextColor="#000"
                    onChangeText={text => setEventID(text)}
                />
                
            </View>
            <Button title="Continue" onPress={checkTextInput}/>
            
            
        </View>
    );
};

const styles = StyleSheet.create({
  container:{
    
    alignItems:"center",
    justifyContent:"center"
  },
  welcome:{
    fontSize:18,
    color:'#000',
    marginBottom:8,
    marginTop:20
  },
  inputs:{
    marginBottom:12,
    borderWidth:1,
    borderColor:'#bbb',
    borderRadius:5,
    paddingHorizontal:14,
    color: 'black'
}
})

export default FeedbackScreen;