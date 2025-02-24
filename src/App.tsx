import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { AuthProvider } from './context/AuthContext';
import Layout from './components/Layout';
import Login from './pages/Login';
import AdminDashboard from './pages/AdminDashboard';
import CoachDashboard from './pages/CoachDashboard';
import MemberRegistration from './pages/MemberRegistration';
import ProtectedRoute from './components/ProtectedRoute';

function App() {
  return (
    <BrowserRouter>
      <AuthProvider>
        <Routes>
          <Route path="/login" element={<Login />} />
          
          <Route path="/" element={<Layout />}>
            {/* Admin Routes */}
            <Route
              path="admin"
              element={
                <ProtectedRoute allowedRoles={['admin']}>
                  <AdminDashboard />
                </ProtectedRoute>
              }
            />
            <Route
              path="admin/members"
              element={
                <ProtectedRoute allowedRoles={['admin']}>
                  <MemberRegistration />
                </ProtectedRoute>
              }
            />
            
            {/* Coach Routes */}
            <Route
              path="coach"
              element={
                <ProtectedRoute allowedRoles={['coach']}>
                  <CoachDashboard />
                </ProtectedRoute>
              }
            />
            
            {/* Redirect root to appropriate dashboard */}
            <Route
              path="/"
              element={
                <ProtectedRoute>
                  {({ user }) => (
                    <Navigate to={user?.role === 'admin' ? '/admin' : '/coach'} />
                  )}
                </ProtectedRoute>
              }
            />
          </Route>
        </Routes>
      </AuthProvider>
    </BrowserRouter>
  );
}

export default App;