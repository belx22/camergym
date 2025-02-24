import React, { createContext, useContext, useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { AuthState, User } from '../types';
import toast from 'react-hot-toast';

interface AuthContextType extends AuthState {
  login: (email: string, password: string) => Promise<void>;
  logout: () => void;
}

const AuthContext = createContext<AuthContextType | undefined>(undefined);

// Simulated user data
const MOCK_USERS: User[] = [
  {
    id: '1',
    email: 'admin@fcg.cm',
    firstName: 'Admin',
    lastName: 'User',
    role: 'admin',
    createdAt: new Date().toISOString(),
  },
  {
    id: '2',
    email: 'coach@fcg.cm',
    firstName: 'Coach',
    lastName: 'User',
    role: 'coach',
    club: 'Yaoundé Gymnastics Club',
    discipline: 'artistic',
    createdAt: new Date().toISOString(),
  },
];

export function AuthProvider({ children }: { children: React.ReactNode }) {
  const [state, setState] = useState<AuthState>({
    user: null,
    isAuthenticated: false,
    isLoading: true,
  });
  const navigate = useNavigate();

  useEffect(() => {
    // Simulate checking for stored auth
    const storedUser = localStorage.getItem('user');
    if (storedUser) {
      setState({
        user: JSON.parse(storedUser),
        isAuthenticated: true,
        isLoading: false,
      });
    } else {
      setState(prev => ({ ...prev, isLoading: false }));
    }
  }, []);

  const login = async (email: string, password: string) => {
    // Simulate API call
    const user = MOCK_USERS.find(u => u.email === email);
    
    if (user && password === 'password') {
      setState({
        user,
        isAuthenticated: true,
        isLoading: false,
      });
      localStorage.setItem('user', JSON.stringify(user));
      toast.success('Login successful');
      navigate(user.role === 'admin' ? '/admin' : '/coach');
    } else {
      toast.error('Invalid credentials');
    }
  };

  const logout = () => {
    setState({
      user: null,
      isAuthenticated: false,
      isLoading: false,
    });
    localStorage.removeItem('user');
    navigate('/login');
    toast.success('Logged out successfully');
  };

  return (
    <AuthContext.Provider value={{ ...state, login, logout }}>
      {children}
    </AuthContext.Provider>
  );
}

export function useAuth() {
  const context = useContext(AuthContext);
  if (context === undefined) {
    throw new Error('useAuth must be used within an AuthProvider');
  }
  return context;
}