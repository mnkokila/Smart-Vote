import React, { useContext,useState }  from "react";
import { Text,View,StyleSheet, Button, TextInput } from "react-native";
import Spinner from "react-native-loading-spinner-overlay/lib";
import { AuthContext } from "../context/AuthContext";

const ManageFeedbackScreen = ({ route }) => {
    const {userInfo,isLoading,addFeedback} = useContext(AuthContext);
    const { name } = route.params;

    
    //const { buttonvalue,setButtonvalue } = useState(null)
    
    

   // addFeedback(userInfo.reg_id,route.params.eventID,buttonvalue)
    
   buttonvalue = (val) => {
        
        addFeedback(userInfo.reg_id,route.params.eventID,val)
    }

    
    
    console.log(route.params.eventID)
    return (
        <View style={styles.container}>
            <Spinner visible={isLoading} />
            <View style={{marginVertical: 10}}>
              <Text style={styles.welcome}> {userInfo.child_name} Event {route.params.eventID} Feedback</Text>
            </View>

            <View style={{marginVertical: 20}}>
              <Button style={styles.hbuttons} title="Very Good" value="1"  id={1}  color="green" onPress={() => this.buttonvalue(1)}/>
            </View>

            <View style={{marginVertical: 20}}>
              <Button style={styles.hbuttons} title="     Good      "  value="2" id={2} color="blue" onPress={() => this.buttonvalue(2)}/>
            </View>

            <View style={{marginVertical: 20}}>
              <Button style={styles.hbuttons} title="      Poor      " value="3" id={3} color="orange" onPress={() => this.buttonvalue(3)}/>
            </View>

            <View style={{marginVertical: 20}}>
              <Button style={styles.hbuttons} title="        Bad        " value="4" id={4} color="red" onPress={() => this.buttonvalue(4)}/>
            </View>

            
            
            
            
        </View>
    );
};

const styles = StyleSheet.create({
  container:{
    
    alignItems:"center",
    justifyContent:"center"
  },
  hbuttons:{
    flexDirection: 'row', 
        height: 50,
        width:200
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

export default ManageFeedbackScreen;