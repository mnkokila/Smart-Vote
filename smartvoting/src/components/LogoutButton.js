import React from 'react';
import { TouchableOpacity, Text } from 'react-native';

const LogoutButton = ({ onPress }) => (
  <TouchableOpacity onPress={onPress}>
    <Text>Logout</Text>
  </TouchableOpacity>
);

export default LogoutButton;