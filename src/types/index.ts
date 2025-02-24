export interface User {
  id: string;
  email: string;
  firstName: string;
  lastName: string;
  role: 'admin' | 'coach' | 'judge' | 'gymnast' | 'committee';
  club?: string;
  discipline?: string;
  photoUrl?: string;
  createdAt: string;
}

export interface Gymnast {
  id: string;
  firstName: string;
  lastName: string;
  dateOfBirth: string;
  club: string;
  category: string;
  photoUrl?: string;
  coachId: string;
  discipline: string;
  createdAt: string;
}

export interface Club {
  id: string;
  name: string;
  location: string;
  createdAt: string;
  coaches: string[];
  members: number;
}

export interface Judge {
  id: string;
  firstName: string;
  lastName: string;
  email: string;
  discipline: string;
  level: string;
  certifications: string[];
  createdAt: string;
}

export interface AuthState {
  user: User | null;
  isAuthenticated: boolean;
  isLoading: boolean;
}