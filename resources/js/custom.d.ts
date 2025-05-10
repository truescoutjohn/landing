declare module '*.svg' {
  import type { DefineComponent, SVGAttributes } from '@vue/runtime-dom';

  const component: DefineComponent<{}, {}, {}, {}, {}, SVGAttributes>;

  export default component;
}
