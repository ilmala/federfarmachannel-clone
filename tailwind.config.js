module.exports = {
  content: ["./resources/views/**/*.php"],
  theme: {
    screens: {
      'desktop': '1170px'
    },
    colors: {
      transparent: 'rgba(0,0,0,0)',
      black: '#000000',
      complementary: '#4ec419',
      white: '#ffffff',
      grey: {
        default: '#bdbdbd',
        'xx-light': '#fafbfc',
        light: '#f6f7f9',
        medium: '#e2e2e2',
      },
      main: {
        base: '#00a9ea',
        light: '#dceef7',
        dark: '#002f40',
      },
      super: {
        dark: '#001821',
      },
      system: {
        green: {
          light: '#34c759'
        },
        blue: {
          light: '#0a7aff'
        }
      },
    },
    fontFamily: {
      'sans': ['Poppins', 'sans-serif']
    },
    fontSize: {
      '2xs': '11px',
      xs: '12px',
      '2sm': '13px',
      sm: '14px',
      base: '16px',
      lg: '18px',
      xl: '20px',
      '2xl': '24px',
      '3xl': '32px',
      '4xl': '48px',
      '5xl': '60px',
    },
    extend: {
      boxShadow: {
        'video-big': '0 2px 50px 0 rgba(0, 0, 0, 0.3)'
      }
    },
  },
  plugins: [],
}
