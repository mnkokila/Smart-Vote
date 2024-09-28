import React, { useContext }  from "react";
import { Text,View,StyleSheet, Button,TextInput } from "react-native";
import Spinner from "react-native-loading-spinner-overlay/lib";
import { AuthContext } from "../context/AuthContext";


const ComplainScreen = () => {
    const {userInfo,isLoading,generalFeedback} = useContext(AuthContext);
    const [complain, setComplain] = React.useState(null);

    const checkTextInput = () => {
      //Check for the Name TextInput
      if (!complain) {
        alert('Please Enter Complain');
        return;
      }else{
        generalFeedback(userInfo.reg_id,complain)
        setComplain("");
      }
      
    };

    return (
        <View style={styles.container}>
            <Spinner visible={isLoading} />
            <View style={{marginVertical: 10}}>
               <Text style={styles.welcome}>Hello {userInfo.child_name}. Type Your Complain Here</Text>
            </View>
            
            <View style={{marginVertical: 20}}>
            <TextInput
                    multiline
                    numberOfLines={10}
                    style={styles.input}
                    onChangeText={text => setComplain(text)}
                    value={complain}
                    placeholder=""
                    
                />
              <Button style={styles.hbuttons} title="Save" color="green" onPress={checkTextInput}/>
            </View>
            
        </View>
    );
};

const styles = StyleSheet.create({
  container:{
   
    padding:20,
   
  },
  welcome:{
    fontSize:18,
    color:'#000',
    marginBottom:8,
    marginTop:20
  },
  input: {
    margin: 12,
    borderWidth: 1,
    color: 'black',
    textAlignVertical: 'top'
  },
})

export default ComplainScreen;